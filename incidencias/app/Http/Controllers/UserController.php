<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Autor;

class UserController extends Controller

{
    protected $usuarios;
 

    public function __construct(Autor $usuarios)
    {
        $this->usuarios = $usuarios;
    }

    public function index()
    {
        $usuarios = $this->usuarios->obtenerUsuarios();
        return view('layouts.master', ['usuario' => $usuarios]);
    }

    public function logout()

    {
        Cookie::queue(Cookie::forget('laravel_session'));
        
        return view('incidencias.index');
    }

    public function show($id)
    {
        $usuarios = $this->usuarios->obtenerUsuariosId($id);
        return view('usuarios.ver', ['usuario' => $usuarios]);
    }
}
?>
