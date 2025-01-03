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
    public function storeComentario(Request $request)
    {
      
        $user_id = Auth::id(); //Esto es para obtener el ID del usuario autenticado
        

            $request-> validate([
                "descripcion_comentario"=>['required']
                
            ],[
                "descripcion_comentario.required"=>"Ingresar Comentario!"
                
    
            ]);
            ComentarioModel::create([
                'usuario_id' => $user_id,
                'producto_id' => $request['id_producto'],
                'descripcion_comentario' => $request['descripcion_comentario']
            ]);
        

    
        

        return back()->with('success', 'comentario enviado correctamente');
    }

    public function storerespuesta(Request $request)
    {   
        // dd($request->all()); //PARA SABER QUE LLEGA 
      
        $user_id = Auth::id(); //Esto es para obtener el ID del usuario autenticado

       

      

            $request-> validate([
                "respuesta_comentario" => ['required']
            ],[
                "respuesta_comentario.required"=>"Ingresar respuesta"
    
            ]);

            ComentarioModel::create([
                'usuario_id'=>$user_id,
                'producto_id'=>$request['id_producto'],
                'descripcion_comentario'=>$request-> input('respuesta_comentario'),
                'id_padre' => $request['id_padre']

            ]);
        

    
        

        return back()->with('success', 'comentario enviado correctamente');
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
    public function update(Request $request, $id)
    {
        $comentario = ComentarioModel::find($id);

        if($request->estado){
            $comentario->estado = 1 ;
        }else{
            $comentario->estado = 0 ;
        }

        $comentario->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
