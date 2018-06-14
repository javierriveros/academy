@extends('layouts.app')

@section('content')
<section class="page-header page-header__front">
    <img src="{{ asset('img/banner-home-v2.jpg') }}" alt="" class="page-header__img">
    <div class="container page-header__data">
        <div class="row justify-content-center align-items-center">
            <h2 class="page-header__title">Tus cursos</h2>
            <p class="lead">Administra los cursos en los que estás matriculado</p>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        @forelse (\Auth::user()->studentCourses as $course)
            <div class="col-sm-6 col-md-4 col-xl-3 mb-4">
                @include('courses.course', ['course' => $course->course])
            </div>
        @empty
            <div class="card text-center col-12 mb-3">
                <div class="card-body">
                    <h3 class="card-title">Aún no has agregado ningún curso</h3>
                    <p class="card-text">Ve a la sección de <a href="{{ route('courses.index') }}">cursos</a> y agrega alguno</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
