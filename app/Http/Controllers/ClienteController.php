<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ClienteUpdateRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();

        return response()->json($clientes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create($request->validated());

        return response()->json($cliente, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json([
                'error' => [
                    'message' => 'Cliente não encontrado',
                    'details' => [
                        'id' => $id
                    ]
                ]
            ], 404);
        }

        return response()->json($cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteUpdateRequest $request, string $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json([
                'error' => [
                    'message' => 'Cliente não encontrado',
                    'details' => [
                        'id' => $id
                    ]
                ]
            ], 404);
        }

        $cliente->fill($request->validated());
        $cliente->save();

        return response()->json($cliente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json([
                'error' => [
                    'message' => 'Cliente não encontrado',
                    'details' => [
                        'id' => $id
                    ]
                ]
            ], 404);
        }

        $cliente->delete();

        return response()->noContent();
    }

    public function activate(Request $request, string $id)
    {
        $cliente = Cliente::withTrashed()->find($id);

        if (!$cliente) {
            return response()->json([
                'error' => [
                    'message' => 'Cliente não encontrado',
                    'details' => [
                        'id' => $id
                    ]
                ]
            ], 404);
        }

        if (!$cliente->trashed()) {
            return response()->json([
                'error' => [
                    'message' => 'Cliente não está desativado',
                    'details' => [
                        'id' => $id
                    ]
                ]
            ], 400);
        }

        $cliente->restore();

        return response()->json($cliente);
    }
}
