<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;
use App\Models\ComidaIngrediente;

class ComidaController extends Controller
{
    public function index()
    {
        $comidas = Comida::with('ingredientes')->get();
        return response()->json($comidas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'grupo' => 'required',
            'nombre_plato' => 'required',
            'precio_defecto' => 'required|numeric',
            'ingredientes.*.ingrediente' => 'required',
        ]);

        $comida = Comida::create($request->except('ingredientes'));

        foreach ($request->ingredientes as $ingrediente) {
            $comida->ingredientes()->create(['ingrediente' => $ingrediente['ingrediente']]);
        }

        return response()->json($comida, 201);
    }

    public function show($id)
    {
        $comida = Comida::with('ingredientes')->findOrFail($id);
        return response()->json($comida);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'grupo' => 'required',
            'nombre_plato' => 'required',
            'precio_defecto' => 'required|numeric',
            'ingredientes.*.ingrediente' => 'required',
        ]);

        $comida = Comida::findOrFail($id);
        $comida->update($request->except('ingredientes'));

        // Eliminar ingredientes existentes
        $comida->ingredientes()->delete();

        // Agregar los nuevos ingredientes
        foreach ($request->ingredientes as $ingrediente) {
            $comida->ingredientes()->create(['ingrediente' => $ingrediente['ingrediente']]);
        }

        return response()->json($comida, 200);
    }

    public function destroy($id)
    {
        $comida = Comida::findOrFail($id);
        $comida->ingredientes()->delete(); // Eliminar ingredientes relacionados
        $comida->delete();
        return response()->json(null, 204);
    }
}
