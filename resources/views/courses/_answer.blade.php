<li class="media mt-3">
    @if ($answer->user->picture)
        <img src="{{ asset($answer->user->picture) }}" width="40" height="40" alt="Imágen de {{ $answer->user->name }}" class="mr-2 rounded-circle">
    @else
        <img src="{{ asset('img/avatar-robot.png') }}" alt="Imágen de {{ $answer->user->name }}" typeof="Image" width="40" height="40" class="mr-2 rounded-circle">
    @endif
    <div class="media-body">
        <span class="mt-0 text-muted">{{ $answer->user->name }}</span>
        <small class="d-block">Hace: {{ $answer->created_at->diffForHumans() }}</small>
        <p>{!!html_entity_decode($answer->content)!!}</p>
        @if(Auth::user()->id == $answer->user_id) 
            <a href="{{ route('course.question.answers.edit',[$course, $question, $answer]) }}" class="btn btn-link btn-sm "><i class="fa fa-edit"></i> Editar</a>
            @include('answers.delete', [$course, $question, $answer])
        @endif
    </div>
</li>