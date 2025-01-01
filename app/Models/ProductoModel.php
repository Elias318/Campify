<?php

namespace App\Models;

use App\Models\MeGustaModel;
use App\Models\ComentarioModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductoModel extends Model
{
    protected $table= "productos";
    protected $primaryKey = "id_producto";
    public $timestamps = false;
    protected $fillable = ["nombre_producto","precio_producto", "stock_producto", "imagen_producto", "categoria_id","descripcion_producto"];


    public function categoria():BelongsTo{
        return $this->belongsTo(CategoriaModel::class, 'categoria_id', 'id_categoria');
    }

    public function meGustas():HasMany
    {
        return $this->hasMany(MeGustaModel::class, 'producto_id', 'id_producto');
    }


    public function comentarios():HasMany{
        return $this->hasMany(ComentarioModel::class,'producto_id' );
    }
}
