<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImagenProductoModel extends Model
{
    protected $table = 'imagenes_productos';
    protected $fillable = ['producto_id', 'ruta_imagen', 'es_destacada'];

    public function producto(): BelongsTo{
        return $this->belongsTo(ProductoModel::class, 'producto_id', 'id_producto');
    }
}
