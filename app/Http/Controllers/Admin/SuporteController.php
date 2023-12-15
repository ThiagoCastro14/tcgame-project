<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSuporteDTO;
use App\DTO\UpdateSuporteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSuporteRequest;
use App\Models\Suporte;
use App\Services\SuporteService;
use Illuminate\Http\Request;

class SuporteController extends Controller
{
    public function __construct(
        protected SuporteService $service
    ) {}

    public function index(Request $request)
    {
        $suportes = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 5),
            filter: $request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('admin/suporte/index', compact('suportes', 'filters'));
    }

    public function show(string $id)
    {      
        if (!$suporte = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/suporte/show', compact('suporte'));
    }

    public function create()
    {
        return view('admin/suporte/create');
    }

    public function store(StoreUpdateSuporteRequest $request, Suporte $suporte)
    {
        $this->service->new(
            CreateSuporteDTO::makeFromRequest($request)
        );

        return redirect()
                ->route('suporte.index')
                ->with('message', 'Cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
    
        if (!$suporte = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/suporte.edit', compact('suporte'));
    }

    public function update(StoreUpdateSuporteRequest $request, Suporte $suporte, string $id)
    {
        $suporte = $this->service->update(
            UpdateSuporteDTO::makeFromRequest($request),
        );

        if (!$suporte) {
            return back();
        }

        return redirect()
                ->route('suporte.index')
                ->with('message', 'Atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()
                ->route('suporte.index')
                ->with('message', 'Deletado com sucesso!');
    }
}