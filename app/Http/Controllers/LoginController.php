<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Helpers\LogHelper;


class LoginController extends Controller
{

    public function registrar(Request $request){
        LogHelper::log('info', 'Intento de registro', ['email' => $request->correo]);

        $request->validate([
            'g-recaptcha-response' => 'required'
        ], [
            'g-recaptcha-response.required' => 'Debes completar el CAPTCHA.'
        ]);

        $secret = "6LfT_fsqAAAAAOOqYiLbs_Uj8RunLvfm1BSCTqk5";
        $response = $request->input('g-recaptcha-response');

        $captchaValidation = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => $secret,
            'response' => $response,
        ]);

        $captchaResult = $captchaValidation->json();

        if (!$captchaResult['success']) {
            LogHelper::log('error', 'Error en el CAPTCHA', ['email' => $request->correo]);
            return back()->withErrors(['g-recaptcha-response' => 'Error en el CAPTCHA. Inténtalo de nuevo.']);
        }

        try {
            $user = new User();
            $user->nom_usuario = $request->nom_usuario;
            $user->correo = $request->correo;
            $user->tel = $request->tel;
            $user->contrasena = Hash::make($request->contrasena);
            $user->remember_token = Hash::make($request->correo);
            $user->fk_tipo_usuario = $request->fk_tipo_usuario;
            $user->estatus = 1;
            $user->save();

            LogHelper::log('info', 'Usuario registrado exitosamente', ['email' => $request->correo]);

            return redirect()->route('login');
        } catch (\Exception $e) {
            LogHelper::log('error', 'Error al registrar usuario', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Hubo un problema al registrar el usuario.']);
        }
    }

    public function login(Request $request){
        LogHelper::log('info', 'Intento de inicio de sesión', ['email' => $request->correo]);

        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required',
            'g-recaptcha-response' => 'required'
        ]);

        $secret = "6LfT_fsqAAAAAOOqYiLbs_Uj8RunLvfm1BSCTqk5";
        $response = $request->input('g-recaptcha-response');

        $captchaValidation = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => $secret,
            'response' => $response,
        ]);

        $captchaResult = $captchaValidation->json();

        if (!$captchaResult['success']) {
            LogHelper::log('error', 'Error en el CAPTCHA', ['email' => $request->correo]);
            return back()->withErrors(['g-recaptcha-response' => 'Error en el CAPTCHA. Inténtalo de nuevo.']);
        }

        $credentials = ['correo' => $request->correo, 'password' => $request->contrasena, 'estatus' => 1];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            LogHelper::log('info', 'Inicio de sesión exitoso', ['email' => $request->correo]);
            return redirect()->route('panel')->with('success', 'Inicio de sesión exitoso');
        }

        LogHelper::log('warning', 'Intento de inicio de sesión fallido', ['email' => $request->correo]);
        return back()->withErrors(['correo' => 'Credenciales inválidas.']);
    }

    public function logout(Request $request)
    {
        $email = Auth::user() ? Auth::user()->correo : 'Usuario no autenticado';

        LogHelper::log('info', 'Cierre de sesión', ['email' => $email]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Sesión cerrada correctamente');
    }

}
