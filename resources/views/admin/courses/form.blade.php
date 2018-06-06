{!! Form::open(['route' => $route, 'method' => $method, 'files' => true]) !!}
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

    <div class="form-group {!! $errors->first('name', 'has-error') !!}">
        {{ Form::label('name', 'Nombre del curso') }}
        {{ Form::text('name', $course->name, ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('teacher_id', 'Docente titular') }} {!! Form::select('teacher_id',$teachers, null, ['class' => 'form-control',
        'placeholder' => 'Selecciona el docente titular']) !!}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Descripción del curso') }}
        {{ Form::textarea('description', $course->description, ['class' => 'form-control ckeditor', 'required' => 'required']) }}
    </div>

    <div class="custom-file mb-2">
        {{ Form::file('picture', ['class' => 'custom-file-input']) }}
        {{ Form::label('picture', 'Seleccionar imágen', ['class' => 'custom-file-label']) }}
    </div>

    <div class="form-group">
        {{ Form::label('test', 'Test de validación') }}
        <span class="d-block">Escribe la frase: <strong>{{ $course->sentence }}</strong></span>
        {{ Form::text('validation', null, ['placeholder' => 'Escribe la frase mostrada', 'class' => 'form-control']) }}
    </div>

    <div class="form-group text-right">
        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
    </div>
{!! Form::close() !!}