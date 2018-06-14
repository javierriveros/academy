{!! Form::model([$course, $partialNote],['route' => $route, 'method' => $method]) !!}
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
        {{ Form::label('name', 'Nombre de la nota') }}
        {{ Form::text('name', $partialNote->name, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('percentage', 'Porcentaje de la nota') }}
        {{ Form::number('percentage', $partialNote->percentage, ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group text-right">
        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
    </div>
{!! Form::close() !!}
