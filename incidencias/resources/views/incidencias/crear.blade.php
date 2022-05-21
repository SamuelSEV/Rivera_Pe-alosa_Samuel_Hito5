@extends('layouts.master')
@section('title', 'Crear incidencias')
@section('content')
    <div class="container-fluid" style="margin-bottom: 48px">
        @auth
            <div class="row justify-content-center">
                <div class="col-8 ">

                    <div class="card mt-1 mb-1 rounded-3" >
                        <div class="card-header text-center d-flex justify-content-center encabezado">
                            <h1>NUEVA INCIDENCIA</h1>
                           <hr  />
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <form action="/lista/crear" method="POST">
                                @csrf
                                <label class="card-text form-label">TÍTULO:</label>
                                <input class="card-text mb-2 form-control" type="text" name="titulo" placeholder="Introduce título">
                                <label class="card-text form-label">DESCRIPCIÓN:</label>
                                <textarea  class="card-text mb-2 form-control"  rows="10" cols="50" name="descripcion" placeholder="Introduce descripción"></textarea>
                                <label class="card-text form-label">AULA</label>
                                <select class="card-text mb-2 form-control" name="aula">
                                    <option value="" disabled selected hidden>Selecciona un aula</option>
                                    @foreach ($aula as $a)
                                        <option value="{{$a->id}}">{{$a->nombre}}</option>
                                    @endforeach
                                    
                                </select>
                                <input class="card-text mb-2 form-control" type="hidden" name="estado" value="1">
                                <input class="card-text mb-2 form-control" type="hidden" name="creador" value="{{@Auth::user()->id}}">
                               
                                <button  class="btn btn-success btn-lg" type="submit" value="crear">CREAR INCIDENCIA</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
