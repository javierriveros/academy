@extends('layouts.app') 
@section('content')
<div class="container mt-4">
    <h1>Editar respuesta</h1>

    <div class="card">
        <div class="card-body">
            @include('answers.form', ['question' => $question, 'answer' => $answer, 'course' => $course, 'route' => ['course.question.answers.update', $course, $question, $answer],
            'method' => 'PUT'])
        </div>
    </div>
</div>
@endsection