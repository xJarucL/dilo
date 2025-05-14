<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class ForgotPasswordController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'g-recaptcha-response' => 'required'
        ], [
            'correo.required' => 'El correo electrónico es obligatorio.',
            'g-recaptcha-response.required' => 'Debes completar el CAPTCHA.'
        ]);

        // Verificación de CAPTCHA
        $secret = "6LfT_fsqAAAAAOOqYiLbs_Uj8RunLvfm1BSCTqk5";
        $response = $request->input('g-recaptcha-response');

        $captchaValidation = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => $secret,
            'response' => $response,
        ]);

        $captchaResult = $captchaValidation->json();

        if (!$captchaResult['success']) {
            return back()->withErrors(['g-recaptcha-response' => 'Error en el CAPTCHA. Inténtalo de nuevo.']);
        }

        // Buscar usuario por correo
        $user = User::where('correo', $request->input('correo'))->first();

        if (!$user) {
            return back()->with('success', 'Si el correo existe, te enviaremos instrucciones para restablecer tu contraseña.');
        }

        // Generar un token único
        $token = Str::random(64);

        // Guardar o actualizar el token con expiración de 1 hora
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->input('correo')],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        // Enviar el correo con el enlace de recuperación
        Mail::send('emails.reset_password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->input('correo'));
            $message->subject('Recuperación de contraseña');
        });

        return back()->with('success', 'Si el correo existe, te enviaremos instrucciones para restablecer tu contraseña.');
    }

    public function showResetForm(Request $request)
    {
        $token = $request->query('token');

        // Verificar si el token es válido
        $resetToken = DB::table('password_reset_tokens')->where('token', $token)->first();

        if (!$resetToken) {
            return redirect()->route('login')->withErrors(['token' => 'El token de restablecimiento no es válido o ha expirado.']);
        }

        return view('reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required',
        ]);

        // Buscar el token en la base de datos
        $resetToken = DB::table('password_reset_tokens')->where('token', $request->input('token'))->first();

        if (!$resetToken) {
            return back()->withErrors(['token' => 'El token de restablecimiento no es válido o ha expirado.']);
        }

        // Verificar si el token ha expirado (1 hora de validez)
        $expireTime = Carbon::parse($resetToken->created_at)->addHours(1);

        if (Carbon::now()->greaterThan($expireTime)) {
            return back()->withErrors(['token' => 'El token de restablecimiento ha expirado.']);
        }

        // Buscar el usuario
        $user = User::find($resetToken->user_id);

        if (!$user) {
            return back()->withErrors(['correo' => 'Este correo no está registrado.']);
        }

        // Actualizar la contraseña
        $user->contrasena = Hash::make($request->input('password'));
        $user->save();

        // Eliminar el token después de usarlo
        DB::table('password_reset_tokens')->where('token', $request->input('token'))->delete();

        return redirect()->route('login')->with('status', 'Contraseña restablecida con éxito.');
    }
}
