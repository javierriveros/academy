@extends('layouts.app') 
@section('content')
<section class="page-header page-header__front">
    <img src="{{ asset('img/banner-home-v2.jpg') }}" alt="" class="page-header__img">
    <div class="container page-header__data">
        <div class="row justify-content-center align-items-center">
            <h2 class="page-header__title">Administrar recursos</h2>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card text-primary text-center">
                <div class="card-body">
                    <i class="fas fa-user" style="font-size: 5rem"></i>
                    <h4 class="card-title mb-0 mt-2">
                        <a href="" style="color: inherit">Usuarios</a>
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card text-primary text-center">
                <div class="card-body">
                    <i class="fas fa-book" style="font-size: 5rem"></i>
                    <h4 class="card-title mb-0 mt-2">
                        <a href="" style="color: inherit">Cursos</a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection