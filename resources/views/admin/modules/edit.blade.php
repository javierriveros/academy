@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Editar módulo</h1>

        <div class="card">
            <div class="card-body">
                @include('modules.form', ['module' => $module, 'url' => '/modules/' . $module->id, 'method' => 'PATCH'])
            </div>
        </div>
    </div>
@endsection