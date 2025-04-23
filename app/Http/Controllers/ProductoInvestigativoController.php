<?php

namespace App\Http\Controllers;

use App\Models\ProductoInvestigativo;
use App\Models\ProyectoInvestigacion;
use App\Models\SubTipoProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoInvestigativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los grupos con sus productos y usuarios
        $productos = ProductoInvestigativo::all();        
        return view('productos-investigativos.index', [
            'productos' => $productos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $proyectos = ProyectoInvestigacion::where('user_id', $user->id)->where('estado', 'Formulado')->get();
        if ($proyectos->isEmpty()) {
            return redirect()->route('productos-investigativos.index')->with('error', 'No tienes proyectos de investigación formulados.');
        }
        return view('productos-investigativos.create',[
            'subTipos' => SubTipoProducto::all(),
            'proyectos' => $proyectos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'titulo' => 'required|string|max:255',
            'resumen' => 'required|string|max:500',
            'sub_tipo_producto_id' => 'required|exists:sub_tipo_productos,id',
            'proyecto_investigacion_id' => 'required|exists:proyecto_investigacions,id',
        ]);

        // Crear el producto investigativo
        $producto = ProductoInvestigativo::create([
            'titulo' => $request->titulo,
            'resumen' => $request->resumen,
            'sub_tipo_producto_id' => $request->sub_tipo_producto_id,
            'proyecto_investigacion_id' => $request->proyecto_investigacion_id,
        ]);
        // Asignar usuarios
        $producto->usuarios()->attach($request->usuarios);

        return redirect()->route('productos-investigativos.index')->with('success', 'Producto investigativo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductoInvestigativo $productos_investigativo)
    {
        // Obtener el producto con sus relaciones
        

        // return $productos_investigativo;

        return view('productos-investigativos.show', [
            'productos_investigativo' => $productos_investigativo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductoInvestigativo $productoInvestigativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductoInvestigativo $productoInvestigativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductoInvestigativo $productoInvestigativo)
    {
        //
    }
}
