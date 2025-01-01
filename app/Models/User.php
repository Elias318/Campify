<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\MeGustaModel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $table = "usuarios";
    protected $primaryKey = "id";

    protected $fillable = [
        'username',
        'email',
        'password',
        'rol'
    ];

    protected $hidden = [
        'password'
    ];

    public function meGustas()
    {
        return $this->hasMany(MeGustaModel::class, 'user_id', 'id');
    }

    public function Comentarios(){
        return $this->hasMany(ComentarioModel::class, 'usuario_id', 'id');
    }
}



