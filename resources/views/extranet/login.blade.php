@extends('extranet.plantilla')
<!-- ************************************************************* -->
@section('css_pagina')
    <link rel="stylesheet" href="{{ asset('css/extranet/login/login.css') }}">
@endsection
@section('cuerpo_pagina')
    <div class="row" style="min-height: 80vh">
        <div class="col-12">
            <div class="section">
                <div class="container">
                    <div class="row full-height justify-content-center">
                        <div class="col-12 text-center align-self-center py-5">
                            <div class="section pb-5 pt-5 pt-sm-2 text-center">
                                <h6 class="mb-0 pb-3"><span>Ingresar </span><span>Registrarse</span></h6>
                                <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                                <label for="reg-log"></label>
                                <div class="card-3d-wrap mx-auto">
                                    <div class="card-3d-wrapper">
                                        <form class="card-front" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="center-wrap">
                                                <div class="section text-center">
                                                    <h4 class="mb-4 pb-3">Ingreso a Plataforma</h4>
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-style"
                                                            placeholder="Su Correo" id="logemail" autocomplete="off">
                                                        <i class="input-icon uil uil-at"></i>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="password" name="password" class="form-style"
                                                            placeholder="Contraseña" id="logpass" autocomplete="off">
                                                        <i class="input-icon uil uil-lock-alt"></i>
                                                    </div>
                                                    <button type="submit" class="btn mt-4">Ingresar</button>
                                                    <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Olvido su contraseña?</a></p>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card-back">
                                            <div class="center-wrap">
                                                <div class="section text-center">
                                                    <h4 class="mb-4 pb-3">Sign Up</h4>
                                                    <div class="form-group">
                                                        <input type="text" name="logname" class="form-style"
                                                            placeholder="Your Full Name" id="logname" autocomplete="off">
                                                        <i class="input-icon uil uil-user"></i>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="email" name="logemail" class="form-style"
                                                            placeholder="Su Correo" id="logemail" autocomplete="off">
                                                        <i class="input-icon uil uil-at"></i>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="password" name="logpass" class="form-style"
                                                            placeholder="Contraseña" id="logpass" autocomplete="off">
                                                        <i class="input-icon uil uil-lock-alt"></i>
                                                    </div>
                                                    <a href="#" class="btn mt-4">submit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_pagina')
@endsection
