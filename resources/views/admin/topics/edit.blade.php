@extends('layouts.app') 
@section('content')
<div class="container mt-4">
    <h1>Editar tema</h1>

    <div class="card">
        <div class="card-body">
            @include('admin.topics.form', ['topic' => $topic, 'course' => $course, 'route' => ['admin.topics.update', $course, $topic],
            'method' => 'PUT'])
        </div>
    </div>
</div>
@endsection