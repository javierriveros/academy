@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="jumbotron">
            <h1 class="display-3">{{ $course->name }}</h1>
            <p class="lead">{{ $course->description }}</p>
            @if (Auth::check() && Auth::user()->id == $course->user_id)
                <div class="absolute actions">
                    <a href="{{ url('courses/' . $course->id . '/edit') }}" class="btn btn-info">Editar</a>
                    @include('courses.delete', ['course' => $course])
                </div>
            @endif
        </div>
    </div>
@endsection