<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Incidencia;
use App\Models\Autor;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMailComentario;

class ComentariosController extends Controller
{
    protected $comentarios;
    protected $incidencias;
    protected $autores;

    public function __construct(Comentario $comentarios,Incidencia $incidencias, Autor $autores)
    {
        $this->comentarios = $comentarios;
        $this->incidencias = $incidencias;
        $this->autor = $autores;
    }
    public function index(Request $request)
    {

        $comentarios = Comentario::orderBy('id', 'DESC')->paginate(3);
        return view('incidencias.lista', compact('comentarios'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $incidencia = $this->incidencias->obtenerIncidenciaId($id);
        return view('incidencias.comentario', compact('incidencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incidencia = new Incidencia();
        $comentario = new Comentario($request->all());
        $comentario->save();
        
        
        $_POST['autor'] = $comentario->autores->name;
        if ($comentario->autores->notificacion){
            Mail::to($comentario->autores->email)->send(new NotifyMailComentario($_POST['autor'],$_POST['descripcion']));
        }
        return redirect()->action([IncidenciasController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentario = $this->comentarios->obtenerComentarioId($id);
        return view('incidencias.ver', ['comentario' => $comentario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comentario = $this->comentarios->obtenerComentarioId($id);
        return view('comentario.editar', ['comentario' => $comentario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comentario = Comentario::find($id);
        $comentario->fill($request->all());
        $comentario->save();
        return redirect()->action([ComentariosController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comentario = Comentario::find($id);
        $comentario->delete();
        return redirect()->action([ComentariosController::class, 'index']);
    }
}
