<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ModuloUsuarioController extends Controller
{
    public function usuarios(){
        $usuarios = User::all();

        return view('usuarios', compact('usuarios'));
    }

    public function actualizarRol(Request $request, $id){
        $usuario = User::findOrFail($id);
        $usuario->fk_tipo_usuario = $request->fk_tipo_usuario;
        $usuario->save();

        return response()->json(['success' => true, 'message' => 'Rol actualizado correctamente.']);
    }

    public function deshabilitarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->estatus = !$usuario->estatus; // Cambiar de activo a inactivo y viceversa
        $usuario->save();

        return response()->json([
            'success' => true,
            'message' => $usuario->estatus ? 'Usuario habilitado correctamente.' : 'Usuario deshabilitado correctamente.'
        ]);
    }
}
