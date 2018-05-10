@extends('layouts.app')

@section('content')
    <div class="container white">
        <h1>Editar curso</h1>

        @include('courses.form', ['course' => $course, 'url' => '/courses/' . $course->id, 'method' => 'PATCH'])
    </div>
@endsection