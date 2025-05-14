<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'pk_usuario';

    protected $fillable = [
        'nom_usuario',
        'correo',
        'tel',
        'contrasena',
        'fk_tipo_usuario',
        'estatus'
    ];

    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    protected $casts = [
        'estatus' => 'boolean',
    ];

    public function tipo_usuario()
    {
        return $this->belongsTo(Tipo_usuario::class, 'fk_tipo_usuario', 'pk_tipo_usuario');
    }

    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'fk_usuario');
    }
}
