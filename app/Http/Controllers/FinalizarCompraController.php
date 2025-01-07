<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\ProductoModel;
use App\Mail\CompraFinalizada;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class FinalizarCompraController extends Controller
{
   
    public function finalizarCompraDeCarrito(){

        $carrito = session()->get('carrito', []);
        
        $productosEnCarrito = collect($carrito)->map(function ($item) {
            $producto = ProductoModel::find($item['id']);

            return [
                'producto' => $producto,
                'cantidad' => $item['cantidad'],
            ];
        });


        
        

        $usuario = Auth::user();

        return view('producto.finalizacioncompra', compact('productosEnCarrito', 'usuario'));
    }

    public function finalizarCompraIndividual(Request $request){
        
       $nombreProducto = $request->input('nombre_producto');
       $precioProducto = $request->input('precio_producto');
       $cantidadProducto = $request->input('cantidad_producto');

        
       $producto =ProductoModel::where('nombre_producto', $nombreProducto)->first();


       if(!$producto){
            return redirect()->back()->with('error', 'Producto no encontrado');
       }

       $productosEnCarrito = [
            [
                'producto' => $producto,
                'precio' => $precioProducto,
                'cantidad' => $cantidadProducto
                
            ]
        ];
        
        

        $usuario = Auth::user();

        return view('producto.finalizacioncompra', compact('productosEnCarrito', 'usuario'));
    }


    public function compraFinalizada(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'telefono_factura' => ['required', 'numeric', 'digits:10'],
            'nombre_factura' => ['required', 'max:20'],
            'apellido_factura' => ['required', 'max:20'],
            'email_factura' => ['required', 'email', 'max:255'],
            'direccion_factura' => ['required', 'max:255'],
        ], [
            'telefono_factura.required' => 'El teléfono es obligatorio.',
            'telefono_factura.numeric' => 'El teléfono solo puede contener números.',
            'telefono_factura.digits' => 'El teléfono debe tener exactamente 10 dígitos.',
            
            'nombre_factura.required' => 'El nombre es obligatorio.',
            'nombre_factura.max' => 'El nombre no puede tener más de 20 caracteres.',
            
            'apellido_factura.required' => 'El apellido es obligatorio.',
            'apellido_factura.max' => 'El apellido no puede tener más de 20 caracteres.',
            
            'email_factura.required' => 'El correo electrónico es obligatorio.',
            'email_factura.email' => 'El correo electrónico debe tener un formato válido.',
            'email_factura.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            
            'direccion_factura.required' => 'La dirección es obligatoria.',
            'direccion_factura.max' => 'La dirección no puede tener más de 255 caracteres.',
        ]);
    
        // Obtener los productos enviados por el formulario
        $productos = $request->input('productos');
        
        // Enviar el correo
        Mail::to($request->input('email_factura'))->send(new CompraFinalizada($productos, $request->all()));
    
        // Redirigir a la vista de agradecimiento
        return view('producto.agradecimiento')->with([
            'datosComprador' => $request->all(),
            'productos' => $productos
        ]);
    }
    
}



