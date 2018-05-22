<form action="/modules/{{ $course->id }}" class="d-inline-block" method="POST">
    @method('DELETE')
    @csrf
    <input type="submit" class="btn btn-danger" value="Eliminar">
</form>