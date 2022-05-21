@extends('layouts.master')
@section('title', 'Editar incidencias')
@section('content')
    <div class="container-fluid" style="margin-bottom: 48px">
        @auth
            <div class="row justify-content-center">
                <div class="col-8 ">

                    <div class="card mt-1 mb-1 rounded-3">
                        <div class="card-header text-center d-flex justify-content-center encabezado">
                            <h1>NUEVA INCIDENCIA</h1>
                           <hr />
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <form action="/lista/editar/{{ $incidencia->id}}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <label class="card-text form-label">TÍTULO:</label>
                                <input class="card-text mb-2 form-control" type="text" name="titulo" value="{{$incidencia->titulo}}" placeholder="Introduce título">
                                <label class="card-text form-label">DESCRIPCIÓN:</label>
                                <textarea  class="card-text mb-2 form-control" type="text" name="descripcion" rows="10" cols="50" value="{{$incidencia->descripcion}}" placeholder="Introduce descripción">{{$incidencia->descripcion}}</textarea>
                                <label class="card-text form-label">AULA</label>
                                <select class="card-text mb-2 form-control" name="aula" >
                                    <option value="{{ $incidencia->aulas->id }}" disabled selected hidden>{{ $incidencia->aulas->nombre }}</option>
                                    @foreach ($aula as $a)
                                        <option value="{{$a->id}}">{{$a->nombre}}</option>
                                    @endforeach
                                    
                                </select>
                                <label class="card-text form-label">ESTADO</label>
                                <select class="card-text mb-2 form-control" name="estado" >
                                    <option value="{{$incidencia->estados->id}}" disabled selected hidden>{{$incidencia->estados->name}}</option>
                                    @foreach ($estado as $e)
                                        <option value="{{$e->id}}">{{$e->name}}</option>
                                    @endforeach
                                    
                                </select>
                                @if ($incidencia->estados->name == 'Resuelto' || $incidencia->estados->name == 'Derivado a una nueva incidencia')
                                     <input class="card-text mb-2 form-control" type="text" name="fecha_cierre" value="{{$incidencia->updated_at}}" hidden>
                                @endif
                               
                                
                                <button  class="btn btn-success btn-lg" type="submit" value="crear">EDITAR INCIDENCIA</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
