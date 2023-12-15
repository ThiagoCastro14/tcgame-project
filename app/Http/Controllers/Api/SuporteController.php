<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\CreateSuporteDTO;
use App\DTO\UpdateSuporteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSuporteRequest;
use App\Http\Resources\SuporteResource;
use App\Services\SuporteService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SuporteController extends Controller
{
    public function __construct(
        protected SuporteService $service,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $supports = Support::paginate();
        $suportes = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 1),
            filter: $request->filter,
        );

        return ApiAdapter::toJson($suportes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSuporteRequest $request)
    {
        $suporte = $this->service->new(
            CreateSuporteDTO::makeFromRequest($request)
        );

        return (new SuporteResource($suporte))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$suporte = $this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new SuporteResource($suporte);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSuporteRequest $request, string $id)
    {
        $suporte = $this->service->update(
            UpdateSuporteDTO::makeFromRequest($request, $id)
        );

        if (!$suporte) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new SuporteResource($suporte);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}