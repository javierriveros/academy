{!! Form::model([$course, $module],['route' => $route, 'method' => $method]) !!}
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
    
    <div class="form-group {!! $errors->first('title', 'has-error') !!}">
        {{ Form::label('title', 'Nombre del módulo') }}
        {{ Form::text('title', $module->title, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Descripción del módulo') }}
        {{ Form::textarea('description', $module->description, ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group text-right">
        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
    </div>
{!! Form::close() !!}
