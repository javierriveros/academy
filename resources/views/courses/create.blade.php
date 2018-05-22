@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Nuevo curso</h1>

        <div class="card">
            <div class="card-body">
                @include('courses.form', ['course' => $course, 'url' => '/courses', 'method' => 'POST'])
            </div>
        </div>
    </div>
@endsection