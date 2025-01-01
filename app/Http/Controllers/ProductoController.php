<?php

namespace App\Http\Controllers;

use App\Models\ProductoModel;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categorias = $request->input('categorias', []); // Obtiene las categorías seleccionadas

        if (!empty($categorias)) {
            // Filtra los productos por las categorías seleccionadas
            $productos = ProductoModel::whereHas('categoria', function ($query) use ($categorias) {
                $query->whereIn('nombre_categoria', $categorias);
            })->get();
        } else {
            // Si no hay filtros, devuelve todos los productos
            $productos = ProductoModel::all();
        }

        return view('catalogo', compact('productos'));  // ["productos"=>$productros] es lo mismo
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.agregarproducto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            "nombre_producto" => ['required'],
            "precio_producto" => ['required'],
            "stock_producto" => ['required'],
            "descripcion_producto" => ['required'],
            'categoria_id' => ['required', 'integer', 'not_in:""'],
            "imagen_producto" => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Validación para la imagen
        ], [
            "nombre_producto.required" => "Falta completar este campo!",
            "precio_producto.required" => "Falta completar este campo!",
            "stock_producto.required" => "Falta completar este campo!",
            "descripcion_producto.required" => "Falta completar este campo!",
            "categoria_id.required" => "Falta completar este campo!",
            "categoria_id.not_in" => "Falta completar este campo!",
            "imagen_producto.required" => "Falta subir una imagen!",
            "imagen_producto.image" => "El archivo debe ser una imagen!",
            "imagen_producto.mimes" => "La imagen debe estar en formato jpeg, png, jpg o gif!",
            "imagen_producto.max" => "La imagen no puede superar los 2 MB!",
        ]);
        
        // Establecemos donde va a estar la direccion de la foto
        $rutaImagen = $request->file('imagen_producto')->store('imagenes.Productos', 'public'); // Almacena en storage/app/public/images/Productos
        $data['imagen_producto'] = $rutaImagen;

        ProductoModel::create($data);

       return response()->redirectTo("catalogo")->with('success', 'Producto creado exitosamente!');
    }

    public function search(Request $request)
    {
        $busqueda = $request->input("busqueda");

        $productos = ProductoModel::where('nombre_producto', 'LIKE', '%' . $busqueda . '%')->get();

        return view('catalogo', ['productos' => $productos, 'busqueda' => $busqueda]);
    }

    public function show(string $id)
    {
        $producto = ProductoModel::with('comentarios.usuario')->findOrFail($id); // Carga también los usuarios de cada comentario

        return view('producto.vistaProducto', compact('producto'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}
