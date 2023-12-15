<?php

namespace App\Repositories\Contracts;

use App\DTO\CreateRespostaDTO;
use stdClass;

interface RespostaRepositoryInterface
{
    public function getAllBySuporteId(string $suporteId): array;
    public function createNew(CreateRespostaDTO $dto): stdClass;
    public function delete(string $id): bool;
}