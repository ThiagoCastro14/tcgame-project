<?php

namespace App\DTO;

use App\Enums\SuporteStatus;
use App\Http\Requests\StoreUpdateSuporteRequest;

class CreateSuporteDTO
{
    public function __construct(
        public string $assunto,
        public SuporteStatus $status,
        public string $descricao,
    ) {}

    public static function makeFromRequest(StoreUpdateSuporteRequest $request): self
    {
        return new self(
            $request->assunto,
            SuporteStatus::A,
            $request->descricao
        );
    }
}