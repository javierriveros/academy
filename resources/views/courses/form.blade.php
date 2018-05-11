<form action="{{ $url }}" method="POST">
    @method($method)
    @csrf

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
        <label for="course_name">Nombre:</label>
        <input type="text" name="name" id="course_name" class="form-control" value="{{ $course->name }}" maxlength="255" required>
    </div>
    <div class="form-group">
        <label for="course_description">Descripción: </label>
        <textarea name="description" id="course_description" cols="30" rows="10" class="form-control" minlength="50" required>{{ $course->description }}</textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Guardar">
    </div>
</form>