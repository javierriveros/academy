@extends('layouts.app') 

@section('title') Administrar recursos
@endsection

@section('content')
@include('partials.page-header', ['title' => 'Administrar recursos'])
<div class="container">
    <div class="row mb-4 justify-content-center align-items-center">
        @if (Auth::user()->isAdmin())
        <div class="col-12 col-md-6 col-lg-4 mb-2 mt-1">
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
        <div class="col-12 col-md-6 col-lg-4 mb-2 mt-1">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-comments"></i>
                    </div>
                    <span>Preguntas</span>
                </div>
                <a class="card-footer text-white small" href="{{ route('admin.questions.index') }}">
                    <span class="float-left">Administrar</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        @endif
        <div class="col-12 col-md-6 col-lg-4 mb-2 mt-1">
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
    </div>
</div>
@endsection