@extends('layouts.app')

@section('content')
    <div class="container white">
        <h1>Nuevo curso</h1>

        @include('courses.form', ['course' => $course, 'url' => '/courses', 'method' => 'POST'])
    </div>
@endsection