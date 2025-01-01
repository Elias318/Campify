<?php

namespace App\Http\Controllers;

use id;
use Illuminate\Http\Request;
use App\Models\ComentarioModel;
use App\Models\ComentariosModel;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            "descripcion_comentario"=>['required']
        ],[
            "descripcion_comentario.required"=>"Ingresar Comentario"
        ]);

        
        $user_id = Auth::id(); 

        ComentarioModel::create([
            'usuario_id' => $user_id,
            'producto_id' => $request['id_producto'],
            'descripcion_comentario' => $request['descripcion_comentario']
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
