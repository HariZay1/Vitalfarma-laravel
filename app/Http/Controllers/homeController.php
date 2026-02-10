<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index(){
     
            return view('welcome');
    
    }

}
