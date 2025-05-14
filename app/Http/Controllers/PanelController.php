<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Palabra_clave;
use App\Models\User;

class PanelController extends Controller
{
    public function panel(){

        $breadcrumbs = [
            ['name' => 'Inicio', 'url' => route('panel')],
        ];

        $usuarioId = auth()->id();
        $user_categorias = Categoria::where('fk_usuario', $usuarioId)->get();

        $categorias = Categoria::whereHas('usuario', function ($query) {
            $query->where('fk_tipo_usuario', 1);
        })->get();

        $palabras_clave = Palabra_clave::all();

        return view('panel_inicio', compact('categorias', 'palabras_clave', 'user_categorias', 'breadcrumbs'));
    }

}
