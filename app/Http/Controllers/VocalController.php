<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vocal;

class VocalController extends Controller
{
    public function registrar_vocal(Request $request){
        $vocal = new Vocal();

        $vocal->vocal=$request->vocal;

        if ($request->hasFile('img_vocal')) {
            $rutaImagen = $request->file('img_vocal')->store('vocales', 'public');
            $vocal->img_vocal = $rutaImagen; // Guardar la ruta en la BD
        }

        $vocal->fk_usuario=$request->fk_usuario;
        $vocal->estatus=1;

        $vocal->save();

        return redirect()->route('panel');
    }

    public function vocales(){
        $vocales = Vocal::All();

        return view('vocales', compact('vocales'));
    }
}
