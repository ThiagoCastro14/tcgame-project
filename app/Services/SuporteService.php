<?php

namespace App\Services;

use App\DTO\CreateSuporteDTO;
use App\DTO\UpdateSuporteDTO;
use App\Enums\SuporteStatus;
use App\Repositories\Contracts\PaginationInterface;
use App\Repositories\Contracts\SuporteRepositoryInterface;
use stdClass;

class SuporteService
{
    public function __construct(
        protected SuporteRepositoryInterface $repository,
    ) {
    }

    public function paginate(
        int $page = 1,
        int $totalPerPage = 15,
        string $filter = null
    ): PaginationInterface {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter,
        );
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateSuporteDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateSuporteDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }

    public function updateStatus(string $id, SuporteStatus $status): void
    {
        $this->repository->updateStatus($id, $status);
    }
}