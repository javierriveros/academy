<form action="{{ route('course.questions.destroy', [$course, $question]) }}" class="d-inline-block" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-link text-danger btn-sm" title="Eliminar pregunta">
        <i class="fa fa-trash"></i>
        Eliminar
    </button>
</form>