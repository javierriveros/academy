<form action="{{ route('admin.modules.delete', [$course, $module]) }}" class="d-inline-block" method="POST">
    @method('DELETE') 
    @csrf
    <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
</form>