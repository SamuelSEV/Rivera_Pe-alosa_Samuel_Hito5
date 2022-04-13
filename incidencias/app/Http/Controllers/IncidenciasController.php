<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\Aula;
use App\Models\Estado;
use App\Models\Comentario;



class IncidenciasController extends Controller
{
    protected $incidencias;
    protected $comentarios;
    protected $aula;

    public function __construct(Incidencia $incidencias, Comentario $comentarios)
    {
        $this->incidencias = $incidencias;
        $this->comentarios = $comentarios;
    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $titulo = $request->get('buscarportitulo');
        $estado = $request->get('buscarporestado');
        $aula = $request->get('buscarporaula');
        $fecha = $request->get('buscarporfecha');

        $incidencias = Incidencia::orderBy('id', 'DESC')
            ->titulo($titulo)
            ->estado($estado)
            ->aula($aula)
            ->fecha($fecha)
            ->paginate(3);

        $comentarios = Comentario::orderBy('id', 'DESC')->paginate(3);

        return view('incidencias.lista', compact('incidencias', 'comentarios'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incidencias.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incidencia = new Incidencia($request->all());
        $incidencia->save();
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
        $incidencia = $this->incidencias->obtenerIncidenciaId($id);
        return view('incidencias.ver', ['incidencia' => $incidencia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incidencia = $this->incidencias->obtenerIncidenciaId($id);
        return view('incidencia.editar', ['incidencia' => $incidencia]);
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
        $incidencia = Incidencia::find($id);
        $incidencia->fill($request->all());
        $incidencia->save();
        return redirect()->action([IncidenciasController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incidencia = Incidencia::find($id);
        $incidencia->delete();
        return redirect()->action([IncidenciasController::class, 'index']);
    }
}
