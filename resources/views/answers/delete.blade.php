<form action="{{ route('course.question.answers.destroy', [$course, $question, $answer]) }}" class="d-inline-block" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-link text-danger btn-sm" title="Eliminar respuesta">
        <i class="fa fa-trash"></i>
        Eliminar
    </button>
</form>