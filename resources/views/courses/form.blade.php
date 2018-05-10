<form action="{{ $url }}" method="POST">
    @method($method)
    @csrf
    <div class="form-group">
        <label for="course_name">Nombre:</label>
        <input type="text" name="name" id="course_name" class="form-control" value="{{ $course->name }}">
    </div>
    <div class="form-group">
        <label for="course_description">Descripción: </label>
        <textarea name="description" id="course_description" cols="30" rows="10" class="form-control">{{ $course->description }}</textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Guardar">
    </div>
</form>