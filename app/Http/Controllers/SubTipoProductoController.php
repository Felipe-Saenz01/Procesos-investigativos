<?php

namespace App\Http\Controllers;

use App\Models\SubTipoProducto;
use App\Models\TipoProducto;
use Illuminate\Http\Request;

class SubTipoProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('parametros.subtipo-productos.index', [
            'subTipoProductos' => SubTipoProducto::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parametros.subtipo-productos.create',[
            'tipoProductos' => TipoProducto::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:sub_tipo_productos,nombre',
            'tipo_producto_id' => 'required|exists:tipo_productos,id',
        ]);
        
        SubTipoProducto::create($request->only('nombre', 'tipo_producto_id'));
        return redirect()->route('parametros.subtipo-productos.index')->with('success', 'Subtipo de producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubTipoProducto $subTipoProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubTipoProducto $subtipo_producto)
    {
        return view('parametros.subtipo-productos.edit', [
            'subtipo_producto' => $subtipo_producto,
            'tipoProductos' => TipoProducto::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubTipoProducto $subtipo_producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:sub_tipo_productos,nombre,' . $subtipo_producto->id,
            'tipo_producto_id' => 'required|exists:tipo_productos,id',
        ]);

        $subtipo_producto->update($request->only('nombre', 'tipo_producto_id'));
        return redirect()->route('parametros.subtipo-productos.index')->with('success', 'Subtipo de producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubTipoProducto $subtipo_producto)
    {
        // return $subtipo_producto;
        $subtipo_producto->delete();
        return redirect()->route('parametros.subtipo-productos.index')->with('success', 'Subtipo de producto eliminado exitosamente.');
    }
}
