<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;

class FiltroController extends Controller
{
    public function index(Request $request)
    {
        
        $titulo = $request->get('buscarportitulo');
        
        $estado = $request->get('buscarporestado');

        $incidencias = Incidencia::titulo($titulo)->paginate(3);

        return dd($titulo);
        
        return view('incidencias.lista', compact('incidencias'));
    }
}
