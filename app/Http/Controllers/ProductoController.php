<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Producto;
use App\Models\CasProducto;
use App\Models\VistaCasProducto;

class ProductoController extends Controller
{
    public function index(): View
    {
        // Obtener todos los datos de la vista vista_cas_producto utilizando el modelo CasProducto
        $casProductos = VistaCasProducto::all();

        // Mostrar los resultados en la vista welcome
        return view('index', ['casProductos' => $casProductos]);

    }

    public function create(): View //client
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse /*server */
    {
        /*$request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);*/

        Producto::create($request->all());

        //return redirect()->route('productos.index')->with('success', 'Nuevo producto creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        // Aquí podrías implementar la lógica para mostrar los detalles del producto si es necesario
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto): View
    {
        return view('productos.edit', ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto): RedirectResponse
    {
        /*$request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);*/

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto): RedirectResponse
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente!');
    }
}
