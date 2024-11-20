<?php

namespace App\Http\Controllers;

use App\Http\Requests\CidadeRequest;
use App\Http\Requests\CidadeUpdateRequest;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cidades = Cidade::all();

        return response()->json($cidades);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CidadeRequest $request)
    {
        $cidade = Cidade::create($request->validated());

        return response()->json($cidade, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cidade = Cidade::find($id);

        if (!$cidade) {
            return response()->json([
                'error' => [
                    'message' => 'Cidade não encontrada',
                    'details' => [
                        'id' => $id
                    ]
                ]
            ], 404);
        }

        return response()->json($cidade);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CidadeUpdateRequest $request, string $id)
    {
        $cidade = Cidade::find($id);

        if (!$cidade) {
            return response()->json([
                'error' => [
                    'message' => 'Cidade não encontrada',
                    'details' => [
                        'id' => $id
                    ]
                ]
            ], 404);
        }

        $cidade->update($request->validated());

        return response()->json($cidade);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deactivate(Request $request, string $id)
    {
        $cidade = Cidade::find($id);

        if (!$cidade) {
            return response()->json([
                'error' => [
                    'message' => 'Cidade não encontrada',
                    'details' => [
                        'id' => $id
                    ]
                ]
            ], 404);
        }

        $cidade->delete();

        return response()->noContent();
    }

    public function activate(Request $request, string $id)
    {
        $cidade = Cidade::withTrashed()->find($id);

        if (!$cidade) {
            return response()->json([
                'error' => [
                    'message' => 'Cidade não encontrada',
                    'details' => [
                        'id' => $id
                    ]
                ]
            ], 404);
        }

        if (!$cidade->trashed()) {
            return response()->json([
                'error' => [
                    'message' => 'Cidade já está ativa',
                    'details' => [
                        'id' => $id
                    ]
                ]
            ], 400);
        }

        $cidade->restore();

        return response()->json($cidade);
    }
}
