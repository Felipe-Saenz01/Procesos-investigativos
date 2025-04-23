<?php

namespace App\Http\Controllers;

use App\Models\GrupoInvestigacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InvestigadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los grupos con sus productos y usuarios
        $investigadores = User::all();
        return view('investigadores.index', [
            'investigadores' => $investigadores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('investigadores.create', [
            'grupos' => GrupoInvestigacion::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'grupo_investigacion_id' => 'required|exists:grupo_investigacions,id',
            'role' => 'required|in:Investigador,Lider Grupo', // Aquí está el cambio
        ]);

        $password = Hash::make('password');
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'grupo_investigacion_id' => $request->grupo_investigacion_id,
            'role' => $request->role,
        ]);
        return redirect()->route('investigadores.index')->with('success', 'Investigador creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $investigadore)
    {
        return view('investigadores.edit', [
            'grupos' => GrupoInvestigacion::all(),
            'investigador' => $investigadore
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $investigadore)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $investigadore->id,
            'grupo_investigacion_id' => 'required|exists:grupo_investigacions,id',
            'role' => 'required|in:Investigador,Lider Grupo',
        ]);

        $investigadore->update([
            'name' => $request->name,
            'email' => $request->email,
            'grupo_investigacion_id' => $request->grupo_investigacion_id,
            'role' => $request->role,
        ]);
        return redirect()->route('investigadores.index')->with('success', 'Investigador actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
