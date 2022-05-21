@extends('layouts.master')
@section('title', 'Crear comentario')
@section('content')
    <div class="container-fluid" style="margin-bottom: 48px">
        @auth
            <div class="row justify-content-center">
                <div class="col-12 ">

                    <div class="card mt-1 mb-1 rounded-3">
                        <div class="card-header text-center d-flex justify-content-center encabezado">
                            <h1>NUEVO COMENTARIO</h1>
                           <hr />
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <form action="/lista/comentar/{{ $incidencia->id}}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <input class="card-text mb-2 form-control" type="hidden" name="id_incidencia" value="{{ $incidencia->id}}">
                                <label class="card-text form-label">TÍTULO:</label>
                                <input class="card-text mb-2 form-control" type="text" name="titulo" placeholder="Introduce título">
                                <label class="card-text form-label">DESCRIPCIÓN:</label>
                                <textarea  class="card-text mb-2 form-control"  rows="10" cols="50" name="descripcion" placeholder="Introduce descripción"></textarea>
                                
                                <input class="card-text mb-2 form-control" type="hidden" name="autor" value="{{@Auth::user()->id}}">
                                <button  class="btn btn-success btn-lg" type="submit" value="comentar">COMENTAR</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
