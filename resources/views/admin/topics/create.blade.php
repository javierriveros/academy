@extends('layouts.app') 
@section('title') Crear tema
@endsection

@section('content')
<div class="container mt-4">
    <h1>Nuevo tema</h1>

    <div class="card">
        <div class="card-body">
            @include('admin.topics.form', ['topic' => $topic, 'course' => $course, 'route' => ['admin.topics.store', $course->id],
            'method' => 'POST'])
        </div>
    </div>
</div>
@endsection