<?php

namespace App\Http\Controllers;

use App\Models\GrupoInvestigacion;
use Illuminate\Http\Request;

class GrupoInvestigacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los grupos de investigación con sus usuarios relacionados
        $grupos = GrupoInvestigacion::with('usuarios')->get();

        // Pasar los datos a la vista
        return view('grupos-investigacion.index',[
            'grupos' => $grupos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grupos-investigacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
        ]);
        GrupoInvestigacion::create($request->only('nombre','correo'));
        return redirect()->route('grupos-investigacion.index')->with('success', 'Grupo de investigación creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GrupoInvestigacion $grupoInvestigacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrupoInvestigacion $grupos_investigacion)
    {
        // return $grupos_investigacion;
        return view('grupos-investigacion.edit', [
            'grupos_investigacion' => $grupos_investigacion
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GrupoInvestigacion $grupos_investigacion)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
        ]);
        $grupos_investigacion->update($request->only('nombre','correo'));
        return redirect()->route('grupos-investigacion.index')->with('success', 'Grupo de investigación actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrupoInvestigacion $grupos_investigacion)
    {
        // return $grupos_investigacion->usuarios()->count();
        if($grupos_investigacion->usuarios()->count() > 0){
            return redirect()->route('grupos-investigacion.index')->with('error', 'No se puede eliminar el grupo de investigación porque tiene usuarios asociados.');
        }

        $grupos_investigacion->delete();
        return redirect()->route('grupos-investigacion.index')->with('success', 'Grupo de investigación eliminado exitosamente.');
    }
}
