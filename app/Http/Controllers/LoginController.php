<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    //
    public function index(){
        
        return view('auth.login');
        
    }
    public function login(LoginRequest $request)
    {
      
        $credentials = $request->only('email', 'password');

    
        if (Auth::attempt($credentials)) {
         
            $user = Auth::user(); 

            return redirect()->route('panel.index')->with('success', 'Bienvenido, ' . $user->name);
        }

        return redirect()->route('login')->withErrors('Cuenta invalida.');
    }

    protected function authenticated(Request $request, $user) 
    {
        return redirect()->route('panel.index');  
    }
 
} 