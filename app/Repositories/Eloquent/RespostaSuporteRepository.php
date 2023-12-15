<?php

namespace App\Repositories\Eloquent;

use App\DTO\CreateRespostaDTO;
use App\Models\RespostaSuporte as Model;
use App\Repositories\Contracts\RespostaRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use stdClass;

class RespostaSuporteRepository implements RespostaRepositoryInterface
{
    private $model;
    public function __construct(
        Model $model       
    ) {
        $this->model = $model;
    }

    public function getAllBySuporteId(string $suporteId): array
    {
        $resposta = $this->model
            ->with(['user', 'suporte'])
            ->where('suporte_id', $suporteId)->get();

        return $resposta->toArray();
    }

    public function createNew(CreateRespostaDTO $dto): stdClass
    {
        $resposta = $this->model
            ->with('user')->create([
            'descricao' => $dto->descricao,
            'suporte_id' => $dto->suporteId,            
            'user_id' => Auth::user()->id,
        ]);
        $resposta = $resposta->with('user')->first();

        return (object) $resposta->toArray();
    }

    public function delete(string $id): bool
    {
        if (!$resposta = $this->model->find($id)) {
            return false;
        }

        if (Gate::denies('owner', $resposta->user->id)) {
            abort(403, 'Not Authorized');
        }

        return (bool) $resposta->delete();
    }
}