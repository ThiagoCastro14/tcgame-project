<?php

namespace App\DTO;

use App\Enums\SuporteStatus;
use App\Http\Requests\StoreUpdateSuporteRequest;

class UpdateSuporteDTO
{
    public function __construct(
        public string $id,
        public string $assunto,
        public SuporteStatus $status,
        public string $descricao,
    ) {}

    public static function makeFromRequest(StoreUpdateSuporteRequest $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->assunto,
            SuporteStatus::A,
            $request->descricao
        );
    }
}