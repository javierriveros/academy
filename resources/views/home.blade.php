@extends('layouts.app')

@section('facebook')
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title" content="Corocora">
    <meta property="og:type" content="website">
    <meta property="og:description" content="En Corocora (Aula Virtual) puedes crear cursos, administrarlos e incluso manejar las notas de tus estudiantes.">
    <meta property="og:site_name" content="corocora">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">
@endsection

@section('twitter')
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@corocora_av">
    <meta name="twitter:title" content="Corocora (Aula Virtual)">
    <meta name="twitter:description" content="En Corocora (Aula Virtual) puedes crear cursos, administrarlos e incluso manejar las notas de tus estudiantes">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">
@endsection

@section('content')
    <div class="main-banner main-banner__front">
        <div class="container">
            <img src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=575755492ef51726cb066f422908b9d7&auto=format&fit=crop&w=749&q=80" alt="" class="main-banner__img">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="display-3">
                        <strong class="font-weight-bold">Corocora</strong>
                        <small class="d-block ">—Aula virtual—</small>
                    </h1>
                    <h2 class="lead">Aprende desde tu casa con cursos online prácticos. </h2>
                    <a href="{{ url('courses') }}" class="mt-2 btn btn-info btn-round btn-round-lg">Ver cursos</a>
                </div>
                <div class="col-md-2 col-sm-1 d-none d-md-block"></div>
                <div class="col-md-4 d-none d-md-block">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

    <section class="courses">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col">
                    <h1 class="h3 d-block">Últimos cursos agregados <a href="{{ url('courses') }}" class="btn btn-small btn-info btn-round btn-sm" style="float: right">Ver todos</a></h1>
                </div>
            </div>

            <div class="row">
                 @forelse ($courses as $course)
                    <div class="col-sm-6 col-md-6 col-xl-3 mt-2 mb-2">
                        @include('courses.course', ['course' => $course])
                    </div>
                @empty
                    <p>No hay cursos disponibles</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        const toggleNavClass = e => { 
            const $navbar = $(".navbar")
            if($('.main-banner').length > 0) { 
                if ($(window).scrollTop() > 100) { 
                    $navbar.removeClass("bg-transparent")
                    $navbar.removeClass("navbar-dark")
                    $navbar.addClass("navbar-light")
                } else { 
                    $navbar.addClass("bg-transparent")
                    $navbar.removeClass("navbar-light")
                    $navbar.addClass("navbar-dark")
                } 
            } 
        }
        (_ => {
            $(document).ready(toggleNavClass)
            $(window).on("scroll ready", toggleNavClass)
        })()
    </script>
@endsection