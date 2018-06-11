<li class="list-group-item topic d-flex justify-content-between">
    <a href="{{ route('courses.topics.show', [$course, $topic]) }}" class="topic__title">{{ $topic->title }}</a>
    <div class="pull-right">
        @auth
            @if(Auth::user()->isTeacher() && Auth::user()->id == $topic->module->course->teacher_id || Auth::user()->isAdmin())
                <a href="{{ route('admin.topics.edit', [$course, $topic]) }}" class="topic__action text-info"><i class="fas fa-pen-square"></i></a>
            @endif
            @if(Auth::user()->isAdmin())
                <form action="{{ route('admin.topics.delete', [$course, $topic]) }}" class="d-inline-block" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="no-style topic__action text-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            @endif
        @endauth
    </div>
</li>
