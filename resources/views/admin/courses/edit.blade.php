@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Editar curso</h1>

        <div class="card">
            <div class="card-body">
                @include('courses.form', ['course' => $course, 'url' => '/courses/' . $course->id, 'method' => 'PATCH'])
            </div>
        </div>
    </div>
@endsection