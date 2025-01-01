<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoModel;
use Illuminate\Support\Facades\Log;

class CarritoController extends Controller
{
    public function store(Request $request)
    {
        $productoId = $request->json('producto_id');
        $cantidad = 1;
        
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$productoId])) {
            $carrito[$productoId]['cantidad'] += $cantidad;
        } else {
            $producto = ProductoModel::find($productoId);

            if (!$producto) {
                return response()->json(['message' => 'Producto no encontrado']);
            }

            $carrito[$productoId] = [
                'id' => $producto->id_producto,
                'nombre' => $producto->nombre_producto,
                'precio' => $producto->precio_producto,
                'cantidad' => $cantidad,
                'imagen' => $producto->imagen_producto,
            ];
        }

        session()->put('carrito', $carrito);

        return response()->json(['mensaje' => 'Producto agregado al carrito']);
    }

    public function index()
    {
        $carrito = session()->get('carrito', []);
    
        $productosEnCarrito = collect($carrito)->map(function ($item) {
            $producto = ProductoModel::find($item['id']);
    
            return [
                'producto' => $producto,
                'cantidad' => $item['cantidad'],
            ];
        });
    
        return view('carrito', compact('productosEnCarrito'));
       

    }


    public function eliminar(Request $request)
    {
        $productoId = $request->json('producto_id');  
    
        $carrito = session()->get('carrito', []);
    
        if (isset($carrito[$productoId])) {
            unset($carrito[$productoId]);
            session()->put('carrito', $carrito);
        } else {
            return response()->json(['error' => 'Producto no encontrado en el carrito.']);
        }
    
        return response()->json([
            'mensaje' => 'Producto eliminado del carrito.',
        ]);
    }
    
    public function disminuir(Request $request)
    {
        $productoId = $request->json('producto_id');
        $carrito = session()->get('carrito', []);
    
        if (!isset($carrito[$productoId])) {
            return response()->json(['error' => 'Producto no encontrado en el carrito.']);
        }
    
        $carrito[$productoId]['cantidad']--;
    
        if ($carrito[$productoId]['cantidad'] <= 0) {
            unset($carrito[$productoId]);
        }
    
        session()->put('carrito', $carrito);
    
        return response()->json([
            'mensaje' => 'Cantidad actualizada.',
            'cantidad' => $carrito[$productoId]['cantidad'] ?? 0,
        ]);
    }
    
}
