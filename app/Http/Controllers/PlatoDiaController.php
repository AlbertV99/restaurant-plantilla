<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlatoDia;

class PlatoDiaController extends Controller
{
    public function index()
    {
        $platosDia = PlatoDia::with('detalles')->get();
        return response()->json($platosDia);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'detalles.*.platoable_id' => 'required|exists:comidas,id',
            'detalles.*.platoable_type' => 'required|in:App\Models\Comida,App\Models\Producto',
            'detalles.*.precio' => 'required|numeric',
        ]);

        $platoDia = PlatoDia::create($request->only('fecha'));

        foreach ($request->detalles as $detalle) {
            $platoDia->detalles()->create($detalle);
        }

        return response()->json($platoDia, 201);
    }

    public function showLastMenu()
    {
        $ultimoMenu = PlatoDia::with('detalles')->latest()->first();
        return response()->json($ultimoMenu);
    }
}
