<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller

{
    public function logout()

    {

      
        Cookie::queue(Cookie::forget('laravel_session'));
        
        return view('incidencias.index');
        
       
  
    }
    
}
?>
