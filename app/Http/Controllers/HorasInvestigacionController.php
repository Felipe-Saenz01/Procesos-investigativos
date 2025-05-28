<?php

namespace App\Http\Controllers;

use App\Models\HorasInvestigacion;
use App\Models\Periodo;
use App\Models\User;
use Illuminate\Http\Request;

class HorasInvestigacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('horas-investigacion.index', [
            'horasInvestigacion' => HorasInvestigacion::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $usuarios = User::where('role', 'Investigador')->where('role', 'Lider Grupo')->get();
        $usuarios = User::whereIn('role', ['Investigador','Lider Grupo'])->get();;
        return $usuarios;
        $periodos = Periodo::where('estado', 'Activo')->get();
        return view('horas-investigacion.create', [
            'usuarios' => $usuarios,
            'periodos' => $periodos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HorasInvestigacion $horasInvestigacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HorasInvestigacion $horasInvestigacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HorasInvestigacion $horasInvestigacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HorasInvestigacion $horasInvestigacion)
    {
        //
    }

    public function showInvestigador(User $user)
    {
        return view('horas-investigacion.investigador', [
            'user' => $user
        ]);
    }
}
