<?php

namespace App\DTO;

use App\Http\Requests\StoreRespostaSuporteRequest;

class CreateRespostaDTO
{
    public function __construct(
        public string $suporteId,
        public string $descricao,
    ) {
    }

    public static function makeFromRequest(StoreRespostaSuporteRequest $request): self
    {
        return new self(
            $request->suporte_id,
            $request->descricao
        );
    }
}




