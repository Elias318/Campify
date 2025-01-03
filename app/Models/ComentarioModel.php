<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComentarioModel extends Model
{
    protected $table = "comentarios";
    protected $primaryKey ="id_comentario";
    protected $fillable =["descripcion_comentario","estado", "usuario_id", "producto_id", "id_padre"];
    public $timestamps =false;

    public function producto():BelongsTo{
        return $this->belongsTo(ProductoModel::class,'id_producto');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }


    /*ESTO PERMITE RESPONDER A COMENTARIOS */
    public function id_padre(){
        return $this->belongsTo(ComentarioModel::class,'id_padre');
    }
    
    public function respuestas(){
        return $this->hasMany(ComentarioModel::class,'id_padre');
    }
}
