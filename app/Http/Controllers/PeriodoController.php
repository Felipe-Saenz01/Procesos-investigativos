<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('parametros.periodos.index', [
            'periodos' => Periodo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parametros.periodos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:periodos',
            'fecha_limite_planeacion' => 'required|date',
            'fecha_limite_evidencias' => 'required|date'
        ]);
        Periodo::create($request->only('nombre','fecha_limite_planeacion','fecha_limite_evidencias' ));
        return redirect()->route('parametros.periodos.index')->with('success', 'Período creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periodo $periodo)
    {
        return view('parametros.periodos.edit', [
            'periodo' => $periodo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periodo $periodo)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:periodos,nombre,' . $periodo->id,
            'fecha_limite_planeacion' => 'required|date',
            'fecha_limite_evidencias' => 'required|date'
        ]);
        $periodo->update($request->only('nombre','fecha_limite_planeacion','fecha_limite_evidencias'));
        return redirect()->route('parametros.periodos.index')->with('success', 'Período actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periodo $periodo)
    {
        $periodo->delete();
        return redirect()->route('parametros.periodos.index')->with('success', 'Período eliminado exitosamente.');
    }
}
