<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComentarioModel extends Model
{
    protected $table = "comentarios";
    protected $primaryKey ="id_comentario";
    protected $fillable =["descripcion_comentario", "usuario_id", "producto_id"];
    public $timestamps =false;

    public function producto():BelongsTo{
        return $this->belongsTo(ProductoModel::class,'id_producto');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
