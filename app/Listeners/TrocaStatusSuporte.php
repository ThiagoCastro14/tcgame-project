<?php

namespace App\Listeners;

use App\Enums\SuporteStatus;
use App\Events\SuporteEnviado;
use App\Services\SuporteService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TrocaStatusSuporte
{
    /**
     * Create the event listener.
     */
    public function __construct(
        protected SuporteService $suporteService,
    ) {
    }

    /**
     * Handle the event.
     */
    public function handle(SuporteEnviado $event): void
    {
        $resposta = $event->resposta();

        $this->suporteService->updateStatus(
            id: $resposta->suporte_id,
            status: SuporteStatus::P,
        );
    }
}