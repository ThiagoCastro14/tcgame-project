<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateRespostaDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRespostaSuporteRequest;
use App\Services\RespostaSuporteService;
use App\Services\SuporteService;

class RespostaSuporteController extends Controller
{
    public function __construct(
        protected SuporteService $suporteService,
        protected RespostaSuporteService $respostaService,
    ) {
    }

    public function index(string $id)
    {
        if (!$suporte = $this->suporteService->findOne($id)) {
            return back();
        }
        
   
        $respostas = $this->respostaService->getAllBySuporteId($id);

        
        return view('admin.suporte.respostas.respostas', compact('suporte', 'respostas'));
    }

    public function store(StoreRespostaSuporteRequest $request)
    {
      
        $this->respostaService->createNew(
            CreateRespostaDTO::makeFromRequest($request)
        );

        return redirect()
            ->route('respostas.index', $request->suporte_id)
            ->with('message', 'Cadastrado com sucesso!');
    }

    public function destroy(string $suporteId, string $id)
    {
        $this->respostaService->delete($id);

        return redirect()
            ->route('respostas.index', $suporteId)
            ->with('message', 'Deletado com sucesso!');
    }
}