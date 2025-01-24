@extends('extranet.plantilla')
<!-- ************************************************************* -->
@section('css_pagina')
<link rel="stylesheet" href="{{asset('css/extranet/index/index.css')}}">
@endsection
@section('cuerpo_pagina')
    <div class="row mt-5">
        <div class="col-11 col-md-6">
            @include('includes.error-form')
            @include('includes.mensaje')
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($fotos as $foto)
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $i }}"
                            class="{{ $i == 0 ? 'active' : '' }}" aria-current="{{ $i == 0 ? 'true' : '' }}"
                            aria-label="{{ $foto->titulo }}"></button>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($fotos as $foto)
                        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                            <img src="{{ asset($foto->url) }}" class="d-block w-100" alt="..." height="500">
                            <div class="carousel-caption d-none d-md-block" style="font-size: 1.5em;">
                                <h4 style="font-weight: bold; color:black; text-shadow: 1px 1px 2px white;">
                                    {{ $foto->titulo }}</h4>
                                <p style="font-weight: bold; color:black; text-shadow: 1px 1px 2px white;">
                                    {{ $foto->texto }}</p>
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h4 style="text-shadow: 1px 1px 2px rgb(139, 232, 255);">Predios a Destacados</h4>
                </div>
                <div class="col-12">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-md-8">
                            <div id="carouselPredios" class="carousel slide">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="card w-100">
                                            <img src="{{ asset('imagenes/inmuebles/finca1.jpg') }}" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h4><strong>Desde $ 936.401.500</strong></h4>
                                                <span class="">
                                                    <strong>3 Habs.<!-- --> </strong>
                                                    <strong>4<!-- --> <!-- -->Baños</strong>
                                                    <strong>158.17<!-- --> m²</strong>
                                                </span>
                                                <p>Casa en venta</p>
                                                <h5 class="card-title">Chia - Cundinamarca</h5>
                                                <p class="card-text">
                                                    {{ substr('Te ofrecemos casas campestres independientes en Chía con generosas áreas de lote, jardín interior amplio, 3 alcobas, 4 baños, parqueadero doble, club house..', 0, 90) }}
                                                    ...</p>
                                                <a href="#" class="btn btn-primary">Ver Detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="card w-100">
                                            <img src="{{ asset('imagenes/inmuebles/finca2.jpg') }}" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h4><strong>Desde $ 2.680.000.000</strong></h4>
                                                <span class="">
                                                    <strong>5 Habs.<!-- --> </strong>
                                                    <strong>6<!-- --> <!-- -->Baños</strong>
                                                    <strong>420<!-- --> m²</strong>
                                                </span>
                                                <p>Casa en venta</p>
                                                <h5 class="card-title">Cota - Cundinamarca</h5>
                                                <p class="card-text">
                                                    {{ substr('Lote independiente de 1.000 mts jardín privado con Pérgola Y BBQ. Construido 420M2', 0, 90) }}
                                                    ...</p>
                                                <a href="#" class="btn btn-primary">Ver Detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="card w-100">
                                            <img src="{{ asset('imagenes/inmuebles/finca3.jpg') }}" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h4><strong>Desde $ 2.400.000.000</strong></h4>
                                                <span class="">
                                                    <strong>5 Habs.<!-- --> </strong>
                                                    <strong>3<!-- --> <!-- -->Baños</strong>
                                                    <strong>3<!-- --> fgd</strong>
                                                </span>
                                                <p>Finca en venta</p>
                                                <h5 class="card-title">San Pedro - Antioquia</h5>
                                                <p class="card-text">
                                                    {{ substr(
                                                        "El predio tiene un área de 18,176 metros
                                                                                                                                    Un área construida de 572 metros cuadrados

                                                                                                                                    Casa principal consta de 500 metros cuadrados con
                                                                                                                                    5 habitaciones auxiliares
                                                                                                                                    3 baños auxiliares
                                                                                                                                    1 habitación principal con baño vestier y balcón privado",
                                                        0,
                                                        90,
                                                    ) }}
                                                    ...</p>
                                                <a href="#" class="btn btn-primary">Ver Detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselPredios"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselPredios"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h4 style="text-shadow: 1px 1px 2px rgb(139, 232, 255);">Cursos Online</h4>
                </div>
                <div class="col-12">
                    <div id="carouselCursos" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row cursos-container">
                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                        <div class="cursos-img"><img src="{{ asset('imagenes/extranet/concreto.jpeg') }}"
                                                class="img-fluid" alt="..."></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-8">
                                        <div class="cursos-info">
                                            <h2 id="tecnología-básica-del-concreto">Tecnología básica del concreto<a
                                                    class="anchorjs-link " href="#tecnología-básica-del-concreto"
                                                    aria-label="Anchor link for: tecnología básica del concreto"
                                                    data-anchorjs-icon=""
                                                    style="font: 1em / 1 anchorjs-icons; padding-left: 0.375em;"></a></h2>
                                            <h3 id="propuesta-de-valor"><span
                                                    class="glyphicon glyphicon-list-alt"></span>Propuesta de valor<a
                                                    class="anchorjs-link " href="#propuesta-de-valor"
                                                    aria-label="Anchor link for: propuesta de valor"
                                                    data-anchorjs-icon=""
                                                    style="font: 1em / 1 anchorjs-icons; padding-left: 0.375em;"></a></h3>
                                            <p>El Curso de tecnología básica de concreto surge en la Pontificia Universidad
                                                Javeriana para que el personal de obra, estudiantes o profesionales de la
                                                industria de arquitectura, ingeniería y construcción, tengan unas bases
                                                sólidas conceptuales en diseño de mezclas de concreto hidráulico. En este
                                                sentido, el curso contribuye al desarrollo de habilidades para que los
                                                participantes puedan comprender la composición y diseño de mezclas de
                                                concreto hidráulico.</p>
                                            <ul>
                                                <li><span
                                                        class="glyphicon glyphicon-user"></span><strong>Modalidad:</strong>
                                                    Virtual</li>
                                                <!--<li><span class="glyphicon glyphicon-calendar"></span><strong>Fecha de inicio:</strong> 28 de febrero del 2024</li>-->
                                                <li><span
                                                        class="glyphicon glyphicon-time"></span><strong>Duracion:</strong>
                                                    20 horas</li>
                                            </ul>
                                            <p>Nota: A partir de la entrega de credenciales, el usuario contará con 2 meses
                                                para finalizar el curso.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row cursos-container cursos-container-reverse">
                                    <div class="col-sm-12 col-md-6 col-lg-8">
                                        <div class="cursos-info">
                                            <h2 id="control-de-calidad-para-concreto-y-mortero-hidráulico">Control de
                                                calidad para concreto y mortero hidráulico<a class="anchorjs-link "
                                                    href="#control-de-calidad-para-concreto-y-mortero-hidráulico"
                                                    aria-label="Anchor link for: control de calidad para concreto y mortero hidráulico"
                                                    data-anchorjs-icon=""
                                                    style="font: 1em / 1 anchorjs-icons; padding-left: 0.375em;"></a></h2>
                                            <h3 id="propuesta-de-valor-1"><span
                                                    class="glyphicon glyphicon-list-alt"></span>Propuesta de valor<a
                                                    class="anchorjs-link " href="#propuesta-de-valor-1"
                                                    aria-label="Anchor link for: propuesta de valor 1"
                                                    data-anchorjs-icon=""
                                                    style="font: 1em / 1 anchorjs-icons; padding-left: 0.375em;"></a></h3>
                                            <p>El Curso de Control de calidad para concreto y mortero hidráulico surge en la
                                                Universidad Javeriana para que el personal de obra, estudiantes o
                                                profesionales de la industria de arquitectura, ingeniería y construcción,
                                                tengan unas bases sólidas conceptuales en la toma de muestras de concreto y
                                                mortero hidráulico en estado fresco y endurecido de acuerdo con las normas
                                                técnicas y así mismo logren una correcta interpretación de resultados de los
                                                ensayos que se realicen dentro del control de calidad. En este sentido, el
                                                curso contribuye al desarrollo de habilidades para que los participantes
                                                puedan enfrentar los retos que supone la construcción con mayor confianza y
                                                conocimiento técnico. <br>
                                                El curso asume el reto de familiarizar a los participantes en el marco del
                                                control de calidad en obra y en laboratorio para concreto y mortero
                                                hidráulico a partir de la toma de muestras, presentando las diferentes
                                                normativas nacionales e internacionales aplicables en Colombia.</p>
                                            <p></p>
                                            <ul>
                                                <li><span
                                                        class="glyphicon glyphicon-user"></span><strong>Modalidad:</strong>
                                                    Virtual</li>
                                                <!--<li><span class="glyphicon glyphicon-calendar"></span><strong>Fecha de inicio:</strong> 28 de febrero del 2024</li>-->
                                                <li><span
                                                        class="glyphicon glyphicon-time"></span><strong>Duracion:</strong>
                                                    20 horas</li>
                                            </ul>
                                            <p>Nota: A partir de la entrega de credenciales, el usuario contará con 2 meses
                                                para finalizar el curso.</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 order-md-first">
                                        <div class="cursos-img"><img
                                                src="{{ asset('imagenes/extranet/concreto2.jpeg') }}" class="img-fluid"
                                                alt="..."></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row cursos-container cursos-container-reverse">
                                    <div class="col-sm-12 col-md-6 col-lg-8">
                                        <div class="cursos-info">
                                            <h2 id="control-de-calidad-para-concreto-y-mortero-hidráulico">Placa Facil en 6
                                                pasos<a class="anchorjs-link "
                                                    href="#control-de-calidad-para-concreto-y-mortero-hidráulico"
                                                    aria-label="Anchor link for: control de calidad para concreto y mortero hidráulico"
                                                    data-anchorjs-icon=""
                                                    style="font: 1em / 1 anchorjs-icons; padding-left: 0.375em;"></a></h2>
                                            <h3 id="propuesta-de-valor-1"><span
                                                    class="glyphicon glyphicon-list-alt"></span>Propuesta de valor<a
                                                    class="anchorjs-link " href="#propuesta-de-valor-1"
                                                    aria-label="Anchor link for: propuesta de valor 1"
                                                    data-anchorjs-icon=""
                                                    style="font: 1em / 1 anchorjs-icons; padding-left: 0.375em;"></a></h3>
                                            <p>En el año 2000 Ladrillera Santafé desarrolló un sistema para entrepisos,
                                                contrapisos y cubiertas; económico, rápido y seguro, llamado PlacaFácil
                                                Santafé.Este manual le explicará el sistema. A través de él, verá como la
                                                PlacaFácil Santafé, es la mejor opción para sus proyectos.</p>
                                            <p></p>
                                            <ul>
                                                <li><span
                                                        class="glyphicon glyphicon-user"></span><strong>Modalidad:</strong>
                                                    Virtual</li>
                                                <!--<li><span class="glyphicon glyphicon-calendar"></span><strong>Fecha de inicio:</strong> 28 de febrero del 2024</li>-->
                                                <li><span
                                                        class="glyphicon glyphicon-time"></span><strong>Duracion:</strong>
                                                    20 horas</li>
                                            </ul>
                                            <p>Nota: A partir de la entrega de credenciales, el usuario contará con 2 meses
                                                para finalizar el curso.</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 order-md-first">
                                        <div class="cursos-img"><img
                                                src="{{ asset('imagenes/extranet/concreto3.jpeg') }}" class="img-fluid"
                                                alt="..."></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCursos"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselCursos"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-5">
        <div class="col-12 mb-4 text-center">
            <h4 style="text-shadow: 1px 1px 2px rgb(33, 222, 255);"><strong>Nuestras Empresas Aliadas</strong></h4>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <div class="slider">
                <div class="move">
                    <div class="box">
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/patrocinio5.png')}}" alt="">
                    </div>
                    <div class="box">
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/patrocinio6.png')}}" alt="">
                    </div>
                    <div class="box">
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/patrocinio7.jpeg')}}" alt="">
                    </div>
                    <div class="box">
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/patrocinio8.jpeg')}}" alt="">
                    </div>
                    <div class="box">
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/patrocinio10.jpeg')}}" alt="">
                    </div>
                    <div class="box"> <!--Slide-->
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/patrocinio11.jpeg')}}" alt="">
                    </div>
                    <div class="box">
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/homecenter.png')}}" alt="">
                    </div>

                    <!-- 2da vuelta -->

                    <div class="box">
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/patrocinio5.png')}}" alt="">
                    </div>
                    <div class="box">
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/patrocinio6.png')}}" alt="">
                    </div>
                    <div class="box">
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/patrocinio7.jpeg')}}" alt="">
                    </div>
                    <div class="box">
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/patrocinio8.jpeg')}}" alt="">
                    </div>
                    <div class="box">
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/patrocinio10.jpeg')}}" alt="">
                    </div>
                    <div class="box">
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/patrocinio11.jpeg')}}" alt="">
                    </div>
                    <div class="box">
                        <img class="img_slide" src="{{asset('imagenes/patrocinios/homecenter.png')}}" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_pagina')

@endsection
