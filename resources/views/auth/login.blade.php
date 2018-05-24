@extends('layouts.app')

@section('content')
    <form method="POST" action="#"  class="form-signin">
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

                    <div>
                        <label for="validation">Escribe la frase: <strong class="frase"></strong></label>
                        
                        <input id="validation" type="text" class="form-control" placeholder="Frase"
                            name="validation" required>
                        <input type="hidden" name="frase">
                    </div>

                    <div class="checkbox mb-3 mt-2">
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