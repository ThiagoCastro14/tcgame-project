<?php

namespace App\Repositories;

use App\DTO\CreateSuporteDTO;
use App\DTO\UpdateSuporteDTO;
use App\Enums\SuporteStatus;
use App\Models\Suporte;
use App\Repositories\Contracts\PaginationInterface;
use App\Repositories\Contracts\SuporteRepositoryInterface;
use Illuminate\Support\Facades\Gate;
use stdClass;

class SuporteEloquentORM implements SuporteRepositoryInterface
{
    public function __construct(
        protected Suporte $model
    ) {
    }

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {
        $result = $this->model            
            ->with('respostas.user')
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('assunto', $filter);
                    $query->orWhere('descricao', 'like', "%{$filter}%");
                }
            })
            ->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array
    {
        return $this->model
            ->with('user')
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('assunto', $filter);
                    $query->orWhere('descricao', 'like', "%{$filter}%");
                }
            })
            ->get()
            ->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        $suporte = $this->model->with('user')->find($id);
        if (!$suporte) {
            return null;
        }

        return (object) $suporte->toArray();
    }

    public function delete(string $id): void
    {
        $suporte = $this->model->findOrFail($id);

        if (Gate::denies('owner', $suporte->user->id)) {
            abort(403, 'Not Authorized');
        }

        $suporte->delete();
    }

    public function new(CreateSuporteDTO $dto): stdClass
    {
        $suporte = $this->model->create(
            (array) $dto
        );

        return (object) $suporte->toArray();
    }

    public function update(UpdateSuporteDTO $dto): stdClass|null
    {
        if (!$suporte = $this->model->find($dto->id)) {
            return null;
        }

        if (Gate::denies('owner', $suporte->user->id)) {
            abort(403, 'Not Authorized');
        }

        $suporte->update(
            (array) $dto
        );

        return (object) $suporte->toArray();
    }

    public function updateStatus(string $id, SuporteStatus $status): void
    {
        $this->model
            ->where('id', $id)
            ->update([
                'status' => $status->name,
            ]);
    }
}