<?php

namespace App\Http\Controllers;

use App\Models\ProductoInvestigativo;
use App\Models\ProyectoInvestigacion;
use App\Models\SubTipoProducto;
use App\Models\TipoProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoInvestigacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $proyectos = ProyectoInvestigacion::all();
        // return $proyectos;
        return view('proyectos-investigacion.index', [
            'proyectos' => ProyectoInvestigacion::with(['usuario'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyectos-investigacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $status = $request->boolean('es_formulado');
        $user = Auth::user();
        // return $user;
        if($status){
            $request->validate([
                'titulo' => 'required|string|max:255',
                'eje_tematico' => 'required|string|max:255',
                'resumen_ejecutivo' => 'required|string',
                'planteamiento_problema' => 'required|string',
                'antecedentes' => 'required|string',
                'justificacion' => 'required|string',
                'objetivos' => 'required|string',
                'metodologia' => 'required|string',
                'resultados' => 'required|string',
                'riesgos' => 'required|string',
                'bibliografia' => 'required|string',
            ]);

            $proyecto = ProyectoInvestigacion::create([
                'titulo' => $request->titulo,
                'user_id'=> $user->id,
                'eje_tematico' => $request->eje_tematico,
                'resumen_ejecutivo' => $request->resumen_ejecutivo,
                'planteamiento_problema' => $request->planteamiento_problema,
                'antecedentes' => $request->antecedentes,
                'justificacion' => $request->justificacion,
                'objetivos' => $request->objetivos,
                'metodologia' => $request->metodologia,
                'resultados' => $request->resultados,
                'riesgos' => $request->riesgos,
                'bibliografia' => $request->bibliografia,
                'estado' => 'Formulado',
            ]);
            $proyecto->grupos()->attach($user->grupo_investigacion_id);

            return redirect()->route('proyecto-investigacion.index')->with('success', 'Proyecto de investigación creado exitosamente.');

        }else{
            $request->validate([
                'titulo' => 'required|string|max:255',
                'eje_tematico' => 'required|string|max:255',
            ]);

            $proyecto = ProyectoInvestigacion::create([
                'titulo' => $request->titulo,
                'user_id' => $user->id,
                'eje_tematico' => $request->eje_tematico,
                'resumen_ejecutivo' => 'proyecto en formulación',
                'planteamiento_problema' => 'proyecto en formulación',
                'antecedentes' => 'proyecto en formulación',
                'justificacion' => 'proyecto en formulación',
                'objetivos' => 'proyecto en formulación',
                'metodologia' => 'proyecto en formulación',
                'resultados' => 'proyecto en formulación',
                'riesgos' => 'proyecto en formulación',
                'bibliografia' => 'proyecto en formulación',
                'estado' => 'En formulación',
            ]);
            $proyecto->grupos()->attach($user->grupo_investigacion_id);

            $tipoProducto = TipoProducto::firstOrCreate(['nombre'=> 'Formulación de Proyectos']);
            
            $subTipoProducto = SubTipoProducto::firstOrCreate([
                'nombre' => 'Formulación de Proyectos',
                'tipo_producto_id' => $tipoProducto->id,
            ]);

            $producto = ProductoInvestigativo::create([
                'titulo' => 'Formulación del Proyecto',
                'resumen' => 'Formulacion del proyecto titulado '.$proyecto->titulo,
                'sub_tipo_producto_id' => $subTipoProducto->id,
                'proyecto_investigacion_id' => $proyecto->id,
            ]);

            $producto->usuarios()->attach($user->id);
            

            return redirect()->route('proyecto-investigacion.index')->with('success', 'Proyecto de investigación creado exitosamente.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProyectoInvestigacion $proyecto_investigacion)
    {
        return view('proyectos-investigacion.show', [
            'proyecto' => $proyecto_investigacion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProyectoInvestigacion $proyectoInvestigativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProyectoInvestigacion $proyectoInvestigativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProyectoInvestigacion $proyectoInvestigativo)
    {
        //
    }
}
