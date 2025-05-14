<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letra;

class AbecedarioController extends Controller
{
    public function registrar_letra(Request $request){
        $letra = new Letra();

        $letra->letra=$request->letra;

        if ($request->hasFile('img_letra')) {
            $rutaImagen = $request->file('img_letra')->store('categorias', 'public');
            $letra->img_letra = $rutaImagen; // Guardar la ruta en la BD
        }

        $letra->fk_usuario=$request->fk_usuario;
        $letra->estatus=1;

        $letra->save();

        return redirect()->route('abecedario');
    }

    public function abecedario(){
        $abecedario = Letra::All();

        return view('abecedario', compact('abecedario'));
    }
}
