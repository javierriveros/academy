@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Nuevo módulo</h1>

        <div class="card">
            <div class="card-body">
                @include('modules.form', ['module' => $module, 'url' => '/modules', 'method' => 'POST'])
            </div>
        </div>
    </div>
@endsection