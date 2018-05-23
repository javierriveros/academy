@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Nuevo curso</h1>

        <div class="card">
            <div class="card-body">
                @include('admin.courses.form', ['course' => $course, 'route' => 'admin.courses.store', 'method' => 'POST'])
            </div>
        </div>
    </div>
@endsection