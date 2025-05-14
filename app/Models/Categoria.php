<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $table = "categoria";
    protected $primaryKey = 'pk_categoria';

    public function usuario(){
        return $this->belongsTo(User::class, 'fk_usuario');
    }

}
