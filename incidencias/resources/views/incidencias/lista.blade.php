@extends('layouts.master')
@section('title', 'Listar incidencias')
@section('content')
<div class="container-fluid">
    @foreach ($incidencias as $incidencia)
    <div class="row justify-content-center">
        <div class="col-12 ">

            <div class="card mt-1 mb-1 rounded-3" style="background-color: rgb(132,206,157); color:black">
                <div class="card-header text-center d-flex justify-content-between " style="background-color: #62B56F; color:black" >
                    <h4>{{ $incidencia->titulo }}</h4>
                    <h4>{{ $incidencia->creador }}</h4>
                    <h4>{{ $incidencia->aula }}</h4>
                    <h4>{{ $incidencia->estado }} / {{ $incidencia->created_at }}</h4>
                </div>
                <div class="card-body">
                    <p class="mb-0">{{ $incidencia->descripcion}}</p>
                </div>
                <hr style="color: black; margin: 0px"/>
                <div class="card-footer" style="background-color: #62B56F; color:black">
                    <h3>Comentarios</h3>

                    <div class="card mt-3 rounded-3">
                        <div class="card-header text-center d-flex justify-content-around" style="background-color: #F6F6F6; color:black">
                            <h4>{{ $incidencia->creador }}</h4>
                            <h4>{{ $incidencia->created_at }}</h4>
                        </div>
                        <div class="card-body" style="background-color: white; color:black">
                            <p>{{ $incidencia->descripcion}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection