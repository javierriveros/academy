{!! Form::model([$course, $question],['route' => $route, 'method' => $method]) !!}
    @if ($errors->any())
        <div class="alert alert-danger no-hide">
            <strong>Errores:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group {!! $errors->first('title', 'has-error') !!}">
        {{ Form::label('title', 'Título de la pregunta') }}
        {{ Form::text('title', $question->title, ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('content', 'Contenido de la pregunta') }}
        {{ Form::textarea('content', $question->content, ['class' => 'form-control ckeditor', 'required' => 'required']) }}
    </div>

    <div class="form-group text-right">
        {{ Form::submit('Enviar', ['class' => 'btn btn-success']) }}
    </div>
{!! Form::close() !!}