@extends('layouts.master')
@section('title', 'Perfil usuario')
@section('content')
<div class="container-fluid">


    @auth

    @foreach ($usuarios as $usuario)
    <div class="row justify-content-center">
        <div class="col-12 ">

            <div class="card mt-1 mb-1 rounded-3" style="background-color: rgb(132,206,157); color:black">
                <div class="card-header text-center d-flex justify-content-center " style="background-color: #62B56F; color:black">
                    <h1>PERFIL</h1>
                </div>
                <div class="card-body text-center d-flex justify-content-center">
                    <h4>Nombre: {{ $usuario->name }}</h4>
                    <h4>Contraseña: {{ $usuario->password }}</h4>

                    <h4>Email: {{$usuario->email}}</h4>

                    <h4>Rol: {{ $usuario->rol }}</h4>

                    <div class="switch-button">
                        <!-- Checkbox -->
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <!-- Botón -->
                        <label for="switch-label" class="switch-button__label">Notificacion</label>
                    </div>

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
    @endauth
</div>
@endsection