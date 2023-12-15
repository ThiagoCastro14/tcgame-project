<?php

namespace App\Repositories\Contracts;

use App\DTO\CreateSuporteDTO;
use App\DTO\UpdateSuporteDTO;
use App\Enums\SuporteStatus;

use stdClass;

interface SuporteRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateSuporteDTO $dto): stdClass;
    public function update(UpdateSuporteDTO $dto): stdClass|null;
    public function updateStatus(string $id, SuporteStatus $status): void;
}