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
            })->paginate(3);

            // Incluye los filtros en los enlaces de paginación
            $productos->appends(['categorias' => $categorias]);

        } else {
            // Si no hay filtros, devuelve todos los productos
            $productos = ProductoModel::paginate(3);
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
             "galeria_imagenes.*" => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ], [
                "nombre_producto.required" => "Falta completar este campo!",
                "precio_producto.required" => "Falta completar este campo!",
                "stock_producto.required" => "Falta completar este campo!",
                "descripcion_producto.required" => "Falta completar este campo!",
                "categoria_id.required" => "Falta completar este campo!",
                "categoria_id.not_in" => "Falta completar este campo!",
                "galeria_imagenes.*.image" => "Cada archivo debe ser una imagen!",
                "galeria_imagenes.*.mimes" => "Las imágenes deben estar en formato jpeg, png, jpg o gif!",
                "galeria_imagenes.*.max" => "Cada imagen no puede superar los 2 MB!",
         ]);
        
         // Guardar datos del producto
        $producto = ProductoModel::create([
            'nombre_producto' => $data['nombre_producto'],
            'precio_producto' => $data['precio_producto'],
            'stock_producto' => $data['stock_producto'],
            'descripcion_producto' => $data['descripcion_producto'],
            'categoria_id' => $data['categoria_id'],
        ]);

        if ($request->hasFile('galeria_imagenes')) {
            foreach ($request->file('galeria_imagenes') as $index => $imagen) {
                // Generar un nombre único para la imagen
                $nombreArchivo = uniqid() . '_' . $imagen->getClientOriginalName();
        
                // Definir la ruta de destino
                $ruta = 'images/galeria/' . $nombreArchivo;
        
                // Mover la imagen a public/images/galeria
                $imagen->move(public_path('images/galeria'), $nombreArchivo);
        
                // Registrar la ruta en la base de datos
                $producto->imagenes()->create([
                    'ruta_imagen' => $ruta,
                    'es_destacada' => $index === 0, // La primera imagen es destacada
                ]);
            }
        }
        

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
        $producto = ProductoModel::with([
            'comentarios.usuario', // Carga los comentarios y el usuario que hizo cada comentario
            'comentarios.respuestas.usuario' // Carga las respuestas de cada comentario junto con el usuario
        ])->findOrFail($id);
        return view('producto.vistaProducto', compact('producto'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductoModel $producto)
    {
        
        
        return view("producto.productoedit", ['producto'=>$producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoModel $producto, Request $request)
    {
      
        $data = $request->validate([
            "nombre_producto" => ['required'],
            "precio_producto" => ['required'],
            "stock_producto" => ['required'],
            "descripcion_producto" => ['required'],
            'categoria_id' => ['required', 'integer', 'not_in:""'],
            "imagen_producto" => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            
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
        
         // Si se carga una nueva imagen, convertirla a Base64
         if ($request->hasFile('imagen_producto')) {
             // Si el usuario sube una nueva imagen
             $imagen = $request->file('imagen_producto');
            
             // Convertimos la imagen a base64
             $imagenBase64 = base64_encode(file_get_contents($imagen));
            
             // Asignamos la nueva imagen
             $data['imagen_producto'] = $imagenBase64;
         } else {
             // Si no se sube ninguna imagen, conservamos la actual
             $data['imagen_producto'] = $producto->imagen_producto;
         }
        

         $producto->nombre_producto = $data["nombre_producto"];
         $producto->categoria_id = $data["categoria_id"];
         $producto->precio_producto = $data["precio_producto"];
         $producto->stock_producto = $data["stock_producto"];
         $producto->descripcion_producto = $data["descripcion_producto"];
         $producto->imagen_producto = $data["imagen_producto"];

         $producto->save();
     
         return response()->redirectTo("panelproductos")->with('success', 'Producto Actualizado exitosamente!');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductoModel $producto)
    {
       $respuesta = $producto->delete();

       if($respuesta){
            return redirect("/panelproductos")->with("success", "Se elimino el producto correctamente");
       }else{
            return redirect("/producto")->with("fail" ,"No se pudo eliminar");
       }
    }
    

    
}
