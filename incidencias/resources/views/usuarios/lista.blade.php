@extends('layouts.master')
@section('title', 'Listar usuarios')
@section('content')
    <div class="container-fluid" style="margin-bottom: 48px">
        @auth
            @if (@Auth::user()->rol == 'administrador')
                <div class="row justify-content-center">
                    <div class="col-12 ">

                        <div class="card mt-1 mb-1 rounded-3" style="background-color: rgb(132,206,157); color:black">
                            <div class="card-header text-center d-flex justify-content-center "
                                style="background-color: #62B56F; color:black">
                                <h1>LISTA USUARIOS</h1>
                                <hr style="color: black; margin: 0px" />
                            </div>
                            <div class="card-body">

                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>NOMBRE</th>
                                            <th>CONTRASEÑA</th>
                                            <th>CORREO</th>
                                            <th>ROL</th>
                                            <th>VALIDADO</th>
                                            <th>EDITAR</th>
                                            <th>ELIMINAR</th>
        
                                        </tr>
                                    </thead>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->password }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>{{ $usuario->rol }}</td>
                                            @if ($usuario->validacion)
                                            <td>
                                                <i class='fas fa-check'  style="color:rgb(6, 242, 61)"></i>
                                            </td>
                                            
                                            @else
                                            <td>
                                                <i class='fas fa-times' style="color:rgb(255, 2, 2)"></i>
                                            </td>
                                            @endif
                                            <td>
                                                <a href="/usuarios/editar/{{ $usuario->id }}" style="color:rgb(6, 242, 61)"><i
                                                            class='fas fa-edit'></i></a>
                                            </td>
                                            <td>
                                                <a href="/usuarios/eliminar/{{ $usuario->id }}" style="color:rgb(255, 2, 2)"
                                                        onclick="return eliminarUsuario('Eliminar Usuario')"><i
                                                            class='fas fa-trash-alt'></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </table>
                            </div>



                        </div>
                    </div>
                </div>
            @endif


        @endauth


    </div>
    <script>
        function eliminarUsuario(value) {
            action = confirm(value) ? true : event.preventDefault()
        }
    </script>
@endsection
