@extends('layouts.app') 
@section('title') Editar pregunta
@endsection
@section('content')
<div class="container mt-4">
    <h1>Editar pregunta</h1>

    <div class="card">
        <div class="card-body">
            @include('questions.form', ['question' => $question, 'course' => $course, 'route' => ['course.questions.update', $course, $question],
            'method' => 'PUT'])
        </div>
    </div>
</div>
@endsection