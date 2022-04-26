@extends('layouts.master')
@section('title', 'Perfil usuario')
@section('content')
    <div class="container-fluid">
        @auth
            <div class="row justify-content-center">
                <div class="col-12 ">

                    <div class="card mt-1 mb-1 rounded-3" style="background-color: rgb(132,206,157); color:black">
                        <div class="card-header text-center d-flex justify-content-center "
                            style="background-color: #62B56F; color:black">
                            <h1>PERFIL</h1>
                        </div>

                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="text-left">
                                    <h4>Nombre: {{ $usuario->name }}</h4>
                                </div>
                                <div class="text-left">
                                    <h4>Contraseña: {{ $usuario->password }}</h4>
                                </div>
                                <div class="col-12">
                                    <h4>Email: {{ $usuario->email }}</h4>
                                </div>
                                <div class="col-12">
                                    <h4>Rol: {{ $usuario->rol }}</h4>
                                </div>
                                <div class="col-12">

                                    <h4 class="mr-2">Notificación email</h4>
                                    
                                    @if ($usuario->notificacion)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked
                                                name="validacion" value="0">
                                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                        </div>
                                    @elseif($usuario->notificacion == 0)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                                name="validacion" value="1">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                        </div>
                                    @endif
                                </div>
                                
                            </div>




                        </div>

                    </div>
                </div>
            </div>


        @endauth
    </div>
@endsection
