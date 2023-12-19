<?php

namespace App\Services;

use App\DTO\CreateRespostaDTO;
use App\Events\SuporteEnviado;
use App\Repositories\Contracts\RespostaRepositoryInterface;
use stdClass;

class RespostaSuporteService
{
    public function __construct(
        protected RespostaRepositoryInterface $repository,
    ) {
    }

    public function getAllBySuporteId(string $suporteId): array
    {
        return $this->repository->getAllBySuporteId($suporteId);
    }

    public function createNew(CreateRespostaDTO $dto): stdClass
    {
        $resposta = $this->repository->createNew($dto);

         SuporteEnviado::dispatch($resposta); 

        return $resposta;
    }

    public function delete(string $id): bool
    {
        return $this->repository->delete($id);
    }
}