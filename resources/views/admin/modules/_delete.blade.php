<form action="{{ route('admin.modules.delete', [$course, $module]) }}" class="d-inline-block" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="no-style module__action text-danger" title="Eliminar módulo">
        <i class="fas fa-trash"></i>
    </button>
</form>
