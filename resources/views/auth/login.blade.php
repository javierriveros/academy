@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('login') }}"  class="form-signin">
        @csrf
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5">
                    <h1 class="h3 text-enter mb-3">Accede a tu cuenta</h1>

                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div>
                        <label for="password" class="sr-only">Contraseña</label>

                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar datos
                        </label>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-round-lg btn-round btn-primary btn-block">
                            Acceder
                        </button>

                        <a class="btn btn-link mt-2 mb-3 text-muted" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </form>
@endsection
