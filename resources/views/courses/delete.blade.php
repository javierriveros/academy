<form action="/courses/{{ $course->id }}" class="d-inline-block" method="POST">
    @method('DELETE')
    @csrf
    <input type="submit" class="btn btn-link red-text no-padding no-margin no-transform" value="Eliminar">
</form>