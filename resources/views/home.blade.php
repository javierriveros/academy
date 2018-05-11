@extends('layouts.app')

@section('content')
    <div class="main-banner main-banner__front">
        <div class="container">
            <img src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="" class="main-banner__img">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="display-3">
                        <strong class="font-weight-bold">Corocora</strong>
                        <small class="d-block ">—Aula virtual—</small>
                    </h1>
                    <h2 class="lead">Aprende desde tu casa con cursos online prácticos. </h2>
                    <a href="#" class="mt-2 btn btn-info btn-round btn-round-lg">Ver cursos</a>
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
                <h1 class="h3">Últimos cursos agregados</h1>
                <a href="#" class="btn btn-small btn-info btn-round">Ver todos</a>
            </div>
        </div>
    </section>
@endsection