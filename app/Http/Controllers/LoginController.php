<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Obtener las credenciales (correo y contraseña)
        $credentials = $request->only(['email', 'password']);

        // Intentamos autenticar al usuario con las credenciales
        if (Auth::attempt($credentials)) {
            // Si el login es exitoso, redirigimos al dashboard
            return redirect('/dashboard');
        }

        // Si no es exitoso, verificamos si el correo existe en la base de datos
        $user = User::where('email', $request->email)->first();

        // Si el correo existe pero la contraseña no coincide
        if ($user && !Auth::attempt($credentials)) {
            // Pasamos un mensaje de error específico para la contraseña incorrecta
            return back()->with('error', 'La contraseña es incorrecta');
        }

        // Si las credenciales no son correctas (correo o contraseña)
        return back()->withErrors('Whoops! Please try to login again.');
    }

    public function showLoginForm()
    {
        return view('auth.login'); // Cambia 'auth.login' por la vista correspondiente de tu formulario de login
    }

    
}
