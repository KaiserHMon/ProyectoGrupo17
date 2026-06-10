<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{

    /**
     * Muestra la lista de productos al público (Catálogo).
     */
    public function mostrar()
    {
        $productos = Producto::all();
        return view('catalogo', compact('productos'));
    }

    /**
     * Guarda los datos del formulario de creación de un nuevo producto.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:50',
                Rule::unique('productos', 'nombre')->whereNull('deleted_at')
            ],
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.unique' => 'Ya existe un producto con este nombre.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe tener un formato válido (jpeg, png, jpg).',
            'imagen.max' => 'La imagen no debe pesar más de 2MB.',
            'imagen.uploaded' => 'La imagen no pudo subirse. Posiblemente sea demasiado grande o el formato no sea válido.'
        ]);

        $data = $request->only(['nombre', 'descripcion', 'precio', 'stock']);

        if ($request->hasFile('imagen')) {
            $imageName = time() . '.' . $request->imagen->extension();
            $request->imagen->storeAs('productos', $imageName, 'public');
            $data['imagen'] = $imageName;
        }

        Producto::create($data);

        return redirect()->back()->with('success', 'Producto creado correctamente.');
    }

    /**
     * Actualiza el producto seleccionado.
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:50',
                Rule::unique('productos', 'nombre')->ignore($producto->id)->whereNull('deleted_at')
            ],
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.unique' => 'Ya existe un producto con este nombre.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe tener un formato válido (jpeg, png, jpg).',
            'imagen.max' => 'La imagen no debe pesar más de 2MB.',
            'imagen.uploaded' => 'La imagen no pudo subirse. Posiblemente sea demasiado grande o el formato no sea válido.'
        ]);

        $data = $request->only(['nombre', 'descripcion', 'precio', 'stock']);

        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe en storage
            if ($producto->imagen && Storage::disk('public')->exists('productos/' . $producto->imagen)) {
                Storage::disk('public')->delete('productos/' . $producto->imagen);
            }

            $imageName = time() . '.' . $request->imagen->extension();
            $request->imagen->storeAs('productos', $imageName, 'public');
            $data['imagen'] = $imageName;
        }

        $producto->update($data);

        return redirect()->back()->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Elimina (softdelete) el producto seleccionado.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->back()->with('success', 'Producto eliminado correctamente.');
    }
}
