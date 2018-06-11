<form action="{{ route('admin.courses.delete', $course) }}" class="d-inline-block" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar curso"><i class="fas fa-trash"></i></button>
</form>