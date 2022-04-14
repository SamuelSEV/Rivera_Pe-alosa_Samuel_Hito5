@extends('layouts.master')
@section('title', 'Listar incidencias')
@section('content')
<div class="container-fluid">
    @auth
    <div class="row justify-content-center mt-2 mb-2" style="background-color: rgb(132,206,157); color:black">
        <div class="col-12  text-center p-2">
            <form class="form-inline d-flex justify-content-between">
                <button class="btn btn-success btn-lg mr-2" type="submit"><i class='fas fa-search'></i></button>
                <input name="buscarporfecha" class="rounded form-control mr-2" type="search" placeholder="POR FECHA" aria-label="Search">
                <input name="buscarportitulo" class="rounded form-control mr-2" type="search" placeholder="POR TITULO" aria-label="Search">
                <input name="buscarporestado" class="rounded form-control mr-2" type="search" placeholder="POR ESTADO" aria-label="Search">
                <input name="buscarporaula" class="rounded form-control mr-2" type="search" placeholder="POR AULA" aria-label="Search">
            </form>
        </div>
    </div>
    <div class="row justify-content-center mt-2 mb-2">
        <div class="col-12 d-flex justify-content-between text-center">
            @if(@Auth::user()->rol == 'usuario')
            <h1>MIS INCIDENCIAS</h1>
            @endif
            @if(@Auth::user()->rol == 'administrador')
            <h1>LISTA INCIDENCIAS</h1>
            @endif

            <a class="btn btn-success btn-lg" href="/crear">CREAR INCIDENCIA</a>
        </div>
    </div>

    @foreach ($incidencias as $incidencia)
    @if(@Auth::user()->name == $incidencia->autores->name || @Auth::user()->rol == 'administrador')
    <div class="row justify-content-center">
        <div class="col-12 ">

            <div class="card mt-1 mb-1 rounded-3" style="background-color: rgb(132,206,157); color:black">
                <div class="card-header text-center d-flex justify-content-between " style="background-color: #62B56F; color:black">
                    <h4>{{ $incidencia->titulo }}</h4>
                    <h4>Autor: {{ $incidencia->autores->name }}</h4>

                    <h4>Aula: {{$incidencia->aulas->nombre}}</h4>

                    <h4>{{ $incidencia->estados->name }} / {{ $incidencia->created_at }}</h4>
                </div>
                <div class="card-body">
                    <p class="mb-0">{{ $incidencia->descripcion}}</p>
                    <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-between text-center">
                            <a class="btn btn-success" href="/comentar">COMENTAR</a>
                            @if(@Auth::user()->rol == 'administrador')
                            <a class="btn btn-success" href="/editar">EDITAR</a>
                            @endif
                            <a class="btn btn-danger" href="/cerrar">CERRAR INCIDENCIA</a>

                        </div>
                    </div>
                </div>
                <hr style="color: black; margin: 0px" />
                <div class="card-footer" style="background-color: #62B56F; color:black">
                    <h3>Comentarios</h3>
                    @foreach ($comentarios as $comentario)
                    @if($comentario->id_incidencia == $incidencia->id)

                    <div class="card mt-3 rounded-3">
                        <div class="card-header text-center d-flex justify-content-around" style="background-color: #F6F6F6; color:black">
                            <h4>{{ $comentario->autores->name }}</h4>
                            <h4>{{ $comentario->fecha }}</h4>
                        </div>
                        <div class="card-body" style="background-color: white; color:black">
                            <p>{{ $comentario->descripcion}}</p>
                        </div>


                    </div>
                    
                    @endif
                    @endforeach
                    
                    
                </div>

            </div>
        </div>
    </div>
    @endif
    @endforeach
    <div class="row justify-content-center mt-2 mb-2" style="background-color: rgb(132,206,157); color:black">
        <div class="col-12  text-center p-2">
            {{ $incidencias->render() }}
        </div>
    </div>
    @endauth

    @guest
    <div class="row justify-content-center mt-2 mb-2" style="background-color: rgb(132,206,157); color:black">
        <div class="col-12  text-center p-2">
            <form class="form-inline d-flex justify-content-between">
                <button class="btn btn-success btn-lg mr-2" type="submit"><i class='fas fa-search'></i></button>
                <input name="buscarporfecha" class="rounded form-control mr-2" type="search" placeholder="POR FECHA" aria-label="Search">
                <input name="buscarportitulo" class="rounded form-control mr-2" type="search" placeholder="POR TITULO" aria-label="Search">
                <input name="buscarporestado" class="rounded form-control mr-2" type="search" placeholder="POR ESTADO" aria-label="Search">
                <input name="buscarporaula" class="rounded form-control mr-2" type="search" placeholder="POR AULA" aria-label="Search">
            </form>
        </div>
    </div>
    @foreach ($incidencias as $incidencia)
    <div class="row justify-content-center">
        <div class="col-12 ">

            <div class="card mt-1 mb-1 rounded-3" style="background-color: rgb(132,206,157); color:black">
                <div class="card-header text-center d-flex justify-content-between " style="background-color: #62B56F; color:black">
                    <h4>{{ $incidencia->titulo }}</h4>
                    <h4>Autor: {{ $incidencia->autores->name }}</h4>

                    <h4>Aula: {{$incidencia->aulas->nombre}}</h4>

                    <h4>{{ $incidencia->estados->name }} / {{ $incidencia->created_at }}</h4>
                </div>
                <div class="card-body">
                    <p class="mb-0">{{ $incidencia->descripcion}}</p>
                </div>
                <hr style="color: black; margin: 0px" />
                <div class="card-footer" style="background-color: #62B56F; color:black">
                    <h3>Comentarios</h3>
                    @foreach ($comentarios as $comentario)
                    @if($comentario->id_incidencia == $incidencia->id)

                    <div class="card mt-3 rounded-3">
                        <div class="card-header text-center d-flex justify-content-around" style="background-color: #F6F6F6; color:black">
                            <h4>{{ $comentario->autores->name }}</h4>
                            <h4>{{ $comentario->fecha }}</h4>
                        </div>
                        <div class="card-body" style="background-color: white; color:black">
                            <p>{{ $comentario->descripcion}}</p>
                        </div>


                    </div>
                    
                    @endif
                    @endforeach
                    
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row justify-content-center mt-2 mb-2" style="background-color: rgb(132,206,157); color:black">
        <div class="col-12  text-center p-2">
            {{ $incidencias->render() }}
        </div>
    </div>
    @endguest
</div>
@endsection