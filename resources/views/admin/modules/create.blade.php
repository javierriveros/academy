@extends('layouts.app')

@section('title')
Crear módulo
@endsection

@section('content')
    <div class="container mt-4">
        <h1>Nuevo módulo</h1>

        <div class="card">
            <div class="card-body">
                @include('admin.modules.form', ['module' => $module, 'course' => $course, 'route' => ['admin.modules.store', $course->id], 'method' => 'POST'])
            </div>
        </div>
    </div>
@endsection