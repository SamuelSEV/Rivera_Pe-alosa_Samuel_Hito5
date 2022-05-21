@extends('layouts.master')
@section('title', 'Editar usuario')
@section('content')
    <div class="container-fluid" style="margin-bottom: 48px">
        @auth
            <div class="row justify-content-center">
                <div class="col-12 ">

                    <div class="card mt-1 mb-1 rounded-3">
                        <div class="card-header text-center d-flex justify-content-center encabezado">
                            <h1>EDITAR PERFIL</h1>
                            <hr />
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <form action="/usuarios/editar/{{ $usuario->id }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <label class="card-text form-label">NOMBRE:</label>
                                <input class="card-text mb-2 form-control" type="text" name="name" value="{{ $usuario->name }}"
                                    placeholder="Introduce usuario">
                                <label class="card-text form-label">CONTRASEÑA:</label>
                                <input class="card-text mb-2 form-control" type="password" name="password"
                                    value="{{ $usuario->password }}" placeholder="Introduce password">
                                <label class="card-text form-label">CORREO:</label>
                                <input class="card-text mb-2 form-control" type="email" name="email"
                                    value="{{ $usuario->email }}" placeholder="Introduce password">
                                <label class="card-text form-label">ROL:</label>
                                <select class="card-text mb-2 form-control" name="rol" >
                                    <option value="{{$usuario->rol}}" disabled selected hidden>{{$usuario->rol}}</option>
                                    
                                    <option value="administrador">administrador</option>
                                    <option value="usuario">usuario</option>
                                    
                                </select>
                               
                                <label class="card-text form-label">VALIDAR:</label>
                                @if ($usuario->validacion)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked
                                            name="validacion" value="0">
                                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                    </div>
                                @else
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" unchecked
                                            name="validacion" value="1">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                    </div>
                                @endif
                                <input class="card-text mb-2 form-control" type="hidden" name="notificacion"
                                    value="{{ $usuario->notificacion }}">
                                <input class="card-text mb-2 form-control" type="hidden" name="id" value="{{ $usuario->id }}">
                                <button class="btn btn-success btn-lg" type="submit" value="editar">EDITAR USUARIO</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
