@extends('layouts.master')
@section('title', 'Listar incidencias')
@section('content')
    <div class="container-fluid" style="margin-bottom: 48px">
        @auth
            @if (@Auth::user()->validacion)
                <div class="row justify-content-center mt-2 mb-2 filtro">
                    <div class="col-12  text-center p-2">
                        <form class="form-inline d-flex justify-content-between">
                            <button class="btn btn-success btn-lg mr-2" type="submit"><i class='fas fa-search'></i></button>
                            <input name="buscarporfecha" class="rounded form-control mr-2" type="search" placeholder="POR FECHA"
                                aria-label="Search">
                            <input name="buscarportitulo" class="rounded form-control mr-2" type="search"
                                placeholder="POR TITULO" aria-label="Search">
                            <input name="buscarporestado" class="rounded form-control mr-2" type="search"
                                placeholder="POR ESTADO" aria-label="Search">
                            <input name="buscarporaula" class="rounded form-control mr-2" type="search" placeholder="POR AULA"
                                aria-label="Search">
                        </form>
                    </div>
                </div>
                <div class="row justify-content-center mt-2 mb-2">
                    <div class="col-12 d-flex justify-content-between text-center">
                        @if (@Auth::user()->rol == 'usuario')
                            <h1>MIS INCIDENCIAS</h1>
                        @endif
                        @if (@Auth::user()->rol == 'administrador')
                            <h1>LISTA INCIDENCIAS</h1>
                        @endif

                        <a class="btn btn-success btn-lg" href="/lista/crear">CREAR INCIDENCIA</a>
                    </div>
                </div>

                @foreach ($incidencias as $incidencia)
                    @if (@Auth::user()->name == $incidencia->autores->name || @Auth::user()->rol == 'administrador')
                        <div class="row justify-content-center">
                            <div class="col-12 ">

                                <div class="card mt-1 mb-1 rounded-3">
                                    <div class="card-header text-center d-flex justify-content-between encabezado">
                                        <h4>{{ $incidencia->titulo }}</h4>
                                        <h4>Autor: {{ $incidencia->autores->name }}</h4>

                                        <h4>Aula: {{ $incidencia->aulas->nombre }}</h4>
                                        @if ($incidencia->estados->name == 'Resuelto' || $incidencia->estados->name == 'Derivado a una nueva incidencia')
                                            
                                            <h4>{{ $incidencia->estados->name }} / {{ $incidencia->updated_at }}</h4>
                                        @else
                                            <h4>{{ $incidencia->estados->name }} / {{ $incidencia->created_at }}</h4>
                                        @endif

                                    </div>
                                    <div class="card-body">
                                        <p class="mb-0">{{ $incidencia->descripcion }}</p>
                                        <div class="row mt-3">
                                            <div class="col-12 d-flex justify-content-between text-center">
                                                @if ($incidencia->estados->name == 'Resuelto' || $incidencia->estados->name == 'Derivado a una nueva incidencia')
                                                <a class="btn btn-success" href="/lista/comentar/{{ $incidencia->id }}" hidden>COMENTAR</a>
                                                @else
                                                    <a class="btn btn-success" href="/lista/comentar/{{ $incidencia->id }}">COMENTAR</a>
                                                @endif
                                                @if (@Auth::user()->rol == 'administrador')
                                                    <a class="btn btn-success" href="/lista/editar/{{ $incidencia->id }}">EDITAR</a>
                                                @endif
                                                <form action="/lista/editar/{{ $incidencia->id }}" method="POST">
                                                    @csrf
                                                    {{ method_field('PUT') }}
                                                    
                                                    <select class="card-text mb-2 form-control" name="estado"  hidden>
                                                        <option value="5"  selected
                                                            >Resuelto</option>
                                                    </select>
                                                    @if ($incidencia->estados->name == 'Resuelto' || $incidencia->estados->name == 'Derivado a una nueva incidencia')
                                                        <input class="card-text mb-2 form-control" type="text" name="fecha_cierre" value="{{$incidencia->updated_at}}" hidden>
                                                        <button class="btn btn-danger" type="submit" value="cerrar" hidden>CERRAR INCIDENCIA</button>
                                                    @else 
                                                        <button class="btn btn-danger" type="submit" value="cerrar">CERRAR INCIDENCIA</button>
                                                    @endif
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    
                                    <div class="card-footer pie">
                                        <h3>Comentarios</h3>
                                        @foreach ($comentarios as $comentario)
                                            @if ($comentario->id_incidencia == $incidencia->id)
                                                <div class="card mt-3 rounded-3">
                                                    <div
                                                        class="card-header text-center d-flex justify-content-around comentario-header">
                                                        <h4>{{ $comentario->autores->name }}</h4>
                                                        <h4>{{ $comentario->fecha }}</h4>
                                                    </div>
                                                    <div class="card-body comentario-body">
                                                        <p>{{ $comentario->descripcion }}</p>
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
                
            @else
                <div class="row justify-content-center">
                    <div class="col-12 ">
                        <h1>Espera tu validación</h1>
                    </div>
                </div>
            @endif
        @endauth

        @guest
            <div class="row justify-content-center mt-2 mb-2 filtro">
                <div class="col-12  text-center p-2">
                    <form class="form-inline d-flex justify-content-between">
                        <button class="btn btn-success btn-lg mr-2" type="submit"><i class='fas fa-search'></i></button>
                        <input name="buscarporfecha" class="rounded form-control mr-2" type="search" placeholder="POR FECHA"
                            aria-label="Search">
                        <input name="buscarportitulo" class="rounded form-control mr-2" type="search" placeholder="POR TITULO"
                            aria-label="Search">
                        <input name="buscarporestado" class="rounded form-control mr-2" type="search" placeholder="POR ESTADO"
                            aria-label="Search">
                        <input name="buscarporaula" class="rounded form-control mr-2" type="search" placeholder="POR AULA"
                            aria-label="Search">
                    </form>
                </div>
            </div>
            @foreach ($incidencias as $incidencia)
                <div class="row justify-content-center">
                    <div class="col-12 ">

                        <div class="card mt-1 mb-1 rounded-3">
                            <div class="card-header text-center d-flex justify-content-between encabezado">
                                <h4>{{ $incidencia->titulo }}</h4>
                                <h4>Autor: {{ $incidencia->autores->name }}</h4>

                                <h4>Aula: {{ $incidencia->aulas->nombre }}</h4>

                                <h4>{{ $incidencia->estados->name }} / {{ $incidencia->created_at }}</h4>
                            </div>
                            <div class="card-body">
                                <p class="mb-0">{{ $incidencia->descripcion }}</p>
                            </div>
                            <hr />
                            <div class="card-footer pie">
                                <h3>Comentarios</h3>
                                @foreach ($comentarios as $comentario)
                                    @if ($comentario->id_incidencia == $incidencia->id)
                                        <div class="card mt-3 rounded-3">
                                            <div
                                                class="card-header text-center d-flex justify-content-around comentario-header">
                                                <h4>{{ $comentario->autores->name }}</h4>
                                                <h4>{{ $comentario->fecha }}</h4>
                                            </div>
                                            <div class="card-body comentario-body">
                                                <p>{{ $comentario->descripcion }}</p>
                                            </div>


                                        </div>
                                    @endif
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        @endguest
    </div>
@endsection
