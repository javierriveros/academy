@extends('layouts.app') 
@section('content')
<main class="container">
    <article class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2 class="card-title">Mi Perfil</h2>
                        @if (Auth::user()->picture)
                            <img src="{{ asset($user->picture) }}" alt="Imágen de {{ $user->name }}" class="rounded-circle" style="max-width: 150px">
                        @else
                            <img src="{{ asset('img/avatar-robot.png') }}" alt="Imágen de {{ $user->name }}" class="rounded-circle" style="max-width: 150px">
                        @endif
                    </div>
                    
                    {!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT', 'files' => true]) !!}
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
                        @if (Auth::user()->isAdmin())
                            <div class="form-group">
                                {{ Form::label('type', 'Tipo de usuario')}} 
                                {{ Form::select('type', [
                                    '1' => 'Estudiante',
                                    '2' => 'Profesor',
                                    '3' => 'Administrador'
                                ], $user->type, ['class' => 'form-control']) }}
                            </div>
                        @endif

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Foto de perfil</span>
                            </div>
                            <div class="custom-file">
                                {{ Form::file('picture', ['class' => 'custom-file-input']) }}
                                {{ Form::label('picture', 'Seleccionar imágen', ['class' => 'custom-file-label']) }}
                            </div>
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