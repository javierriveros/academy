@extends('layouts.app') 
@section('content')
@include('partials.page-header', ['title' => 'Administrar recursos'])
<div class="container">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-book"></i>
                    </div>
                    <span>Cursos</span>
                </div>
                <a class="card-footer text-white small" href="{{ route('admin.courses.index') }}">
                    <span class="float-left">Administrar</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-user"></i>
                    </div>
                    <span>Usuarios</span>
                </div>
                <a class="card-footer text-white small" href="{{ route('admin.users.index') }}">
                    <span class="float-left">Administrar</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection