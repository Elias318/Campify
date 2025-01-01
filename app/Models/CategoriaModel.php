<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
    protected $table ="categorias";
    protected $primaryKey="id_categoria";
    public $timestamps = false;

   // protected $fillable = ["id_categoria","nombre_categoria"];
    
}
