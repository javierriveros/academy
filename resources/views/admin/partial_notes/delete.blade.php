<form action="{{ route('course.partial_notes.destroy', [$course, $pn]) }}" class="d-inline-block" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar nota parcial">
        <i class="fas fa-trash"></i>
        <span class="d-none d-lg-inline-block">Eliminar nota</span>
    </button>
</form>