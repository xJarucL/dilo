<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Palabra;
use App\Models\Palabra_clave;

class PalabraController extends Controller
{
    public function categorias(){
        $categorias = Categoria::whereHas('usuario', function ($query) {
            $query->where('fk_tipo_usuario', 1);
        })->get();

        return view('ingresar_palabra', compact('categorias'));
    }


    public function registrar_palabra(Request $request){
        $palabra = new Palabra();

        $palabra->palabra=$request->palabra;

        if ($request->hasFile('img_palabra')) {
            $rutaImagen = $request->file('img_palabra')->store('palabras', 'public');
            $palabra->img_palabra = $rutaImagen; // Guardar la ruta en la BD
        }

        $palabra->fk_categoria=$request->fk_categoria;
        $palabra->fk_usuario=$request->fk_usuario;
        $palabra->estatus=1;

        $palabra->save();

        return redirect()->route('panel');
    }

    public function palabras($id){

        $palabras = Palabra::where('fk_categoria', $id)->get();
        $categoria = Categoria::findOrFail($id);

        $breadcrumbs = [
            ['name' => 'Inicio', 'url' => route('panel')],
            ['name' => $categoria->nom_categoria, 'url' => route('palabras', $id)],
        ];

        return view('palabras_categoria', [
            'palabras' => $palabras,
            'pk_categoria' => $id,
            'breadcrumbs' => $breadcrumbs,
            'categoria' => $categoria
        ]);

    }

    public function palabras_admin($id){

        $palabras = Palabra::where('fk_categoria', $id)->get();
        $categoria = Categoria::findOrFail($id);

        $breadcrumbs = [
            ['name' => 'Inicio', 'url' => route('panel')],
            ['name' => $categoria->nom_categoria, 'url' => route('palabras', $id)],
        ];

        return view('palabras_categoria_admin', [
            'palabras' => $palabras,
            'pk_categoria' => $id,
            'breadcrumbs' => $breadcrumbs,
            'categoria' => $categoria
        ]);

    }

    public function registrar_palabra_clave(Request $request){
        $palabra = new Palabra_clave();

        $palabra->palabra=$request->palabra;

        if ($request->hasFile('img_palabra')) {
            $rutaImagen = $request->file('img_palabra')->store('palabras_clave', 'public');
            $palabra->img_palabra = $rutaImagen;
        }

        $palabra->fk_usuario=$request->fk_usuario;
        $palabra->estatus=1;

        $palabra->save();

        return redirect()->route('panel');
    }
}
