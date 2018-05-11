@extends('layouts.app')

@section('content')
    <div class="big-padding blue-grey text-center white-text bottom-space">
        <h1 class="card-title">Cursos</h1>
        <hr>
    </div>

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