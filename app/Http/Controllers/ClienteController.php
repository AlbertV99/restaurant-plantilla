<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'documento' => 'required',
            'tipo_doc' => 'required',
            'razon_social' => 'required',
        ]);

        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 201);
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return response()->json($cliente);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'documento' => 'required',
            'tipo_doc' => 'required',
            'razon_social' => 'required',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return response()->json($cliente, 200);
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return response()->json(null, 204);
    }
}
