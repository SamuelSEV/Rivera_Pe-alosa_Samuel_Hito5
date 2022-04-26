<!DOCTYPE html>
<html lang="en" style="min-height: 100%; position:relative">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <title>@yield('title')</title>
</head>

<body style="margin: 0px; ">

    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: #67D600; color:black; ">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="https://codeweek-s3.s3.amazonaws.com/event_picture/logo_iespoligonosur_aggnet_24ae5691-fd1d-439f-a6cf-38ba50a9f960.png"
                        alt="" width="50" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/" style="color:black;">
                                <h3>Inicio</h3>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/lista" style="color:black;">
                                <h3>Incidencias</h3>
                            </a>
                        </li>
                        @if (@Auth::user()->rol == 'administrador')
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/usuarios/listar" style="color:black;">
                                    <h3>Usuarios</h3>
                                </a>
                            </li>
                        @endif

                    </ul>
                    <div class="d-flex ms-auto ">
                        <ul class="navbar-nav">
                            @auth
                                <li>

                                    <a class="nav-link bg-image hover-overlay ripple shadow-1-strong" href="/logout"
                                        tabindex="-1" style="color:black;">
                                        <h3>cerrar sesion</h3>
                                    </a>

                                </li>

                                <a href="/perfil/ver/{{@Auth::user()->id}}" class="rounded-circle float-center"><i
                                        class="fas fa-user-circle fa-3x " style="color: white;"></i></a>

                            @endauth
                            @guest
                                <li>
                                    <a class="nav-link bg-image hover-overlay ripple shadow-1-strong" href="/login"
                                        tabindex="-1" style="color:black;">
                                        <h3>Login</h3>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link " href="/register" tabindex="-1" style="color:black;">
                                        <h3>Registro</h3>
                                    </a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>


    @yield('content')
    <footer style="background-color: #67D600; color:black; width: 100%; height: 40px; position: absolute; bottom: 0;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12  mt-2">

                    <h6 class="text-center">Copyright Samuel Rivera Peñalosa, 2022 </h6>

                </div>
            </div>
        </div>
    </footer>
</body>

</html>
