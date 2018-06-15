@extends('layouts.app') 

@section('title') Editar módulo
@endsection
@section('content')
<div class="container mt-4">
    <h1>Editar módulo</h1>

    <div class="card">
        <div class="card-body">
            @include('admin.modules.form', ['module' => $module, 'course' => $course, 'route' => ['admin.modules.update', $course->id, $module->id],
            'method' => 'PUT'])
        </div>
    </div>
</div>
@endsection