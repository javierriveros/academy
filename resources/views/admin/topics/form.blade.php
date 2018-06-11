{!! Form::model([$course, $topic],['route' => $route, 'method' => $method]) !!}
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
        {{ Form::label('title', 'Título del tema') }}
        {{ Form::text('title', $topic->title, ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('module_id', 'Módulo del tema') }} {!! Form::select('module_id',$modules, null, ['class' => 'form-control',
        'placeholder' => 'Selecciona el módulo']) !!}
    </div>

    <div class="form-group">
        {{ Form::label('content', 'Contenido del tema') }}
        {{ Form::textarea('content', $topic->content, ['class' => 'form-control ckeditor', 'required' => 'required']) }}
    </div>

    <div class="form-group text-right">
        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
    </div>
{!! Form::close() !!}