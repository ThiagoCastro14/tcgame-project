<?php

namespace App\Http\Controllers\Api;

use App\DTO\CreateRespostaDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRespostaSuporteRequest;
use App\Http\Resources\RespostaSuporteResource;
use App\Services\RespostaSuporteService;
use App\Services\SuporteService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RespostaSuporteApiController extends Controller
{
    public function __construct(
        protected SuporteService $suporteService,
        protected RespostaSuporteService $respostaService,
    ) {
    }

    public function getRespostasFromSuporte(string $suporteId)
    {
        if (!$this->suporteService->findOne($suporteId)) {
            return response()->json(['message' => 'not_found'], Response::HTTP_NOT_FOUND);
        }

        $respostas = $this->respostaService->getAllBySuporteId($suporteId);

        return RespostaSuporteResource::collection($respostas);
    }

    public function createNewResposta(StoreRespostaSuporteRequest $request)
    {
        $resposta = $this->respostaService->createNew(
            CreateRespostaDTO::makeFromRequest($request)
        );

        return (new RespostaSuporteResource($resposta))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(string $id)
    {
        $this->respostaService->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
