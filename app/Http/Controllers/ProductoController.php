<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Muestra una lista de los productos
     */
    public function index()
    {
        $productos = Producto::all();
        return view('catalogo', compact('productos'));
    }

    /**
     * Muestra el formulario para crear el producto
     */
    public function create()
    {
        return view('producto.crear');
    }

    /**
     * Guarda los datos del formulario de creacion
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'requierd|string|max:50|unique:',
            'descripcion' => 'requierd|string|max:255',
            'precio' => 'required|decimal',
            'stock' => 'requierd|integer',
            'imagen' => 'requierd|string'
        ]);

        Producto::create($request->all());
        return redirect()->route('productos')->with('success', 'Producto creado correctamente');
    }

    /**
     * Muestra el producto
     */
    public function show(Producto $producto)
    {

    }

    /**
     * Formulario para editar el producto seleccionado
     */
    public function edit(Producto $producto)
    {
        return view('productos.editar', compact('productos'));
    }

    /**
     * Actualiza el producto seleccionado
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'requierd|string|max:50|unique:',
            'descripcion' => 'requierd|string|max:255',
            'precio' => 'required|decimal',
            'stock' => 'requierd|integer',
            'imagen' => 'requierd|string'
        ]);

        $producto->update($request->all());
        return redirect()->route('productos')->with('success', 'Task updated successfully.');
    }

    /**
     * Elimina (softdelete) el producto seleccionado
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos')->with('success', 'Task deleted successfully.');
    }
}
