<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest; // Asegúrate de tener este archivo
use App\Models\User;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Mostrar formulario de registro
    public function index()
    {
       
       
        return view('auth.register'); 
    }

    public function store(RegisterRequest $request)
    {
        // Validación automática con RegisterRequest
        $validated = $request->validated();

        // Crear el usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),  // Cifrado de la contraseña
        ]);

        // Iniciar sesión automáticamente (opcional)
        //Auth::login($user);

        // Redirigir al login con un mensaje de éxito
        return redirect('/login')->with('success', 'Se ah creado su cuenta con exito ahora inicia sesion.');
    }
}
