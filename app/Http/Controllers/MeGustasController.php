<?php

namespace App\Http\Controllers;

use App\Models\MeGustaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MeGustasController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $productos = MeGustaModel::where('usuario_id', $userId)
                            ->with(['producto.categoria'])
                            ->get();

        
        return view('meGustas', ["productos"=>$productos]);
    }

    public function toggle(Request $request)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['session' => false]);
        }
    
        $producto_id = $request->json('producto_id');
    
        // Verificar si ya existe un registro en "Me Gustas"
        $meGusta = MeGustaModel::where('usuario_id', $userId)
                               ->where('producto_id', $producto_id)
                               ->first();
    
        if ($meGusta) {
            $meGusta->delete();
            return response()->json(['session' => true, 'like' => false]);
        } else {
            MeGustaModel::create([
                'usuario_id' => $userId,
                'producto_id' => $producto_id,
            ]);
            return response()->json(['session' => true, 'like' => true]);
        }
    }
    
    public function destroy(Request $request)
    {
        $userId = Auth::id();

        $producto_id = $request->json("producto_id");

        $meGusta = MeGustaModel::where("usuario_id", $userId)
                                ->where("producto_id", $producto_id)
                                ->first();

        $meGusta->delete();

        return response()->json(["message" => "Producto eliminado."]);
    }
}
