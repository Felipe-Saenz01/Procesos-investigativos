<?php

namespace App\Http\Controllers;

use App\Models\TipoProducto;
use Illuminate\Http\Request;

class TipoProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('parametros.tipo-productos.index',[
            'tipoProductos' => TipoProducto::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parametros.tipo-productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:tipo_productos,nombre',
        ]);

        TipoProducto::create($request->only('nombre'));
        return redirect()->route('parametros.tipo-productos.index')->with('success', 'Tipo de producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoProducto $tipoProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoProducto $tipo_producto)
    {
        return view('parametros.tipo-productos.edit', [
            'tipoProducto' => $tipo_producto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoProducto $tipo_producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:tipo_productos,nombre,' . $tipo_producto->id,
        ]);

        $tipo_producto->update($request->only('nombre'));

        return redirect()->route('parametros.tipo-productos.index')->with('success', 'Tipo de producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoProducto $tipoProducto)
    {
        $tipoProducto->delete();
        return redirect()->route('parametros.tipo-productos.index')->with('success', 'Tipo de producto eliminado exitosamente.');
    }
}
