<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeGustaModel extends Model
{

    protected $primaryKey="id_megusta";
    protected $table = 'me_gustas';
    public $timestamps = false; //deshabilita los campos de "created_at" y "updated_at"
    protected $fillable = ['usuario_id', 'producto_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    public function producto()
    {
        return $this->belongsTo(ProductoModel::class, 'producto_id', 'id_producto');
    }
}
