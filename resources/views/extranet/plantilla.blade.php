<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('imagenes/sistema/favicon-16x16.png') }}" sizes="64x64">
    <title>SCA - Lonja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/extranet/general.css') }}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    @yield('css_pagina')
</head>

<body>
    <div class="row" style="font-size: 0.9em">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{route('index_extranet')}}">
                        <img src="{{ asset('imagenes/sistema/logo_sca.png') }}" class="img-fluid"
                            alt="..."style="width:auto; max-height: 40px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('index_extranet')}}">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">SCA</a>
                                <ul class="dropdown-menu" style="font-size: 0.9em">
                                    <li><a class="dropdown-item" href="#">Organización</a></li>
                                    <li><a class="dropdown-item" href="#">Regionales</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Contacto</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Noticias</a>
                            </li>
                        </ul>
                        <a id="loginBoton" href="{{route('login_page')}}"><i class="fas fa-user-shield fa-lg" aria-hidden="true"></i> Acceso a la plataforma </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @yield('cuerpo_pagina')
        </div>
    </div>
    <div class="row fixed-bottom p-3 mt-5" style="background-color: rgba(26, 26, 26, 0.0);font-size: 0.8em">
        <div class="col-12 text-center text-black d-flex flex-row justify-content-center">
            <a href="#" class="text-black" style="pointer-events: none;cursor: default;color:#000;">
                <strong>Copyright &copy; 2025 <a href="" style="color: black;margin-left: 10px;">Maya & Moya -
                        Sistem <div class="float-right d-none d-sm-inline-block ml-3">
                            <b>Version</b> 1.0.0
                        </div></a>.</strong>

            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    @yield('script_pagina')
</body>

</html>
