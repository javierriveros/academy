<form action="{{ route('admin.topics.delete', [$course, $topic]) }}" class="d-inline-block" method="POST">
    @method('DELETE')
    @csrf
    <input type="submit" class="btn btn-danger btn-sm" value="Eliminar" title="Eliminar tema">
</form>