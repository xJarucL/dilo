<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Numeros;

class NumerosController extends Controller
{
    public function numeros(){
        $numeros = Numeros::all();

        return view('numeros', compact('numeros'));
    }

    public function registrar_numero(Request $request){
        $numero = new Numeros();

        $numero->numero=$request->numero;

        if ($request->hasFile('img_numero')) {
            $rutaImagen = $request->file('img_numero')->store('numeros', 'public');
            $numero->img_numero = $rutaImagen;
        }

        $numero->fk_usuario=$request->fk_usuario;
        $numero->estatus=1;

        $numero->save();

        return redirect()->route('numeros');
    }
}
