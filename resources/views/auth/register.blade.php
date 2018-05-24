@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 83vh">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrarme</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirma tu contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="validation" class="col-md-4 col-form-label text-md-right">Escribe la frase: </label>
                            <div class="col-md-6">
                                <strong class="frase form-text"></strong>
                                <input id="validation" type="text" class="form-control" placeholder="Frase" name="validation" required>
                                <input type="hidden" name="frase">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    (_ => {
        const form = document.querySelector('form')
        const generateFrase = () => {
            let frases = [
                'El conejo brinca',
                'La iguana tomaba café',
                'Petro presidente',
                'El pez nada'
            ]
            let frase = document.querySelector('.frase')
            let number = parseInt(Math.random() * 4)
            form.frase.value = frases[number]
            frase.innerText = frases[number]
        }
        generateFrase()
        form.addEventListener('submit', e => {
            e.preventDefault()

            if (form.validation.value !== form.frase.value) {
                form.validation.classList.add('is-invalid')
                let d = document.createElement('span')
                d.classList.add('invalid-feedback')
                d.innerHTML = `<strong>La frase no coincide</strong>`
                form.validation.parentElement.append(d)
            } else {
                form.submit()
            }
        })
    })()

</script>
@endsection