<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;


class CategoriaController extends Controller
{
    public function registrar_categoria(Request $request){
        $categoria = new Categoria();

        $categoria->nom_categoria=$request->nom_categoria;
        // $categoria->img_categoria=$request->img_categoria;

        if ($request->hasFile('img_categoria')) {
            $rutaImagen = $request->file('img_categoria')->store('categorias', 'public');
            $categoria->img_categoria = $rutaImagen; // Guardar la ruta en la BD
        }

        $categoria->fk_usuario=$request->fk_usuario;
        $categoria->estatus=1;

        $categoria->save();

        return redirect()->route('panel');
    }
}
