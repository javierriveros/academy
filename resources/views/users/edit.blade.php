@extends('layouts.app') 
@section('content')
<main class="container">
    <article class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Mi Perfil</h2>
                    
                    {!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT']) !!}
                        @include('flash::message') 

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Errores:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            {{ Form::label('email', 'Correo')}} 
                            {{ Form::email('email', $user->email, ['class' => 'form-control', 'readonly' => true,
                            'disabled' => true]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('name', 'Nombre')}} 
                            {{ Form::text('name', $user->name, ['class' => 'form-control', 'required' => true]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('current_password', 'Contraseña actual')}} 
                            {{ Form::password('current_password', ['class' => 'form-control', 'required' => true])
                            }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('new_password', 'Nueva contraseña')}} 
                            {{ Form::password('new_password', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('new_password_confirmation', 'Confirma nueva contraseña')}} 
                            {{ Form::password('new_password_confirmation',
                            ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Guardar Cambios">
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </article>
</main>
@endsection