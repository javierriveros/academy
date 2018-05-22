@extends('layouts.app')

@section('content')
    <section class="page-header page-header__front">
        <img src="{{ asset('img/banner-home-v2.jpg') }}" alt="" class="page-header__img">
        <div class="container page-header__data">
            <div class="row justify-content-center align-items-center">
                <h2 class="page-header__title">Cursos disponibles</h2>
                <p class="lead">Disfruta de nuestra variedad de cursos</p>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            @forelse ($courses as $course)
                <div class="col-sm-6 col-md-4 col-xl-3 mb-4">
                    @include('courses.course', ['course' => $course])
                </div>
            @empty
                <p>No hay cursos disponibles</p>
            @endforelse
        </div>
    </div>
@endsection