{!! Form::model([$question, $answer],['route' => $route, 'method' => $method]) !!}
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
        {{ Form::label('content', 'Contenido de la respuesta') }}
        {{ Form::textarea('content', $answer->content, ['class' => 'form-control ckeditor', 'required' => 'required']) }}
    </div>

    <div class="form-group text-right">
        {{ Form::submit('Enviar', ['class' => 'btn btn-success']) }}
    </div>
{!! Form::close() !!}