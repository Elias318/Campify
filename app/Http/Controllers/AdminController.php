<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoModel;

class AdminController extends Controller
{
    public function mostrarPanel(Request $request){
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

        return view('admin.panelproductos', compact('productos'));  // ["productos"=>$productros] es lo mismo
    }
}
