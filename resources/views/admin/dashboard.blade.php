@extends('layouts.app') 
@section('content')
@include('partials.page-header', ['title' => 'Administrar recursos'])
<div class="container">
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card text-primary text-center">
                <div class="card-body">
                    <i class="fas fa-user" style="font-size: 5rem"></i>
                    <h4 class="card-title mb-0 mt-2">
                        <a href="{{ route('admin.users.index') }}" style="color: inherit">Usuarios</a>
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card text-primary text-center">
                <div class="card-body">
                    <i class="fas fa-book" style="font-size: 5rem"></i>
                    <h4 class="card-title mb-0 mt-2">
                        <a href="{{ route('admin.courses.index') }}" style="color: inherit">Cursos</a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection