<li class="media mb-2">
    @if ($question->user->picture)
        <img src="{{ asset($question->user->picture) }}" width="40" height="40" alt="Imágen de {{ $question->user->name }}" class="mr-2 rounded-circle">
    @else
        <img src="{{ asset('img/avatar-robot.png') }}" alt="Imágen de {{ $question->user->name }}" typeof="Image" width="40" height="40" class="mr-2 rounded-circle">
    @endif
    <div class="media-body">
        <h5 class="mt-0 mb-0">{{ $question->title }}</h5>
        <small class="mt-0">Por: {{ $question->user->name }}</small>
        <small>Hace: {{ $question->created_at->diffForHumans() }}</small>
        <p>{!!html_entity_decode($question->content)!!}</p>

        <button type="button" class="btn btn-link btn-sm" data-toggle="div" data-target="#answerForm-{{ $question->id }}">
            <i class="fa fa-reply-all"></i> Responder 
        </button>
        <button type="button" class="btn btn-link btn-sm" data-toggle="div" data-target="#answers-{{ $question->id }}">
            <i class="fa fa-plus-circle"></i> Ver respuestas 
        </button>
        @if(Auth::user()->id == $question->user_id) 
            <a href="{{ route('course.questions.edit', [$course, $question]) }}" class="btn btn-link btn-sm "><i class="fa fa-edit"></i> Editar</a>
            @include('questions.delete', [$course, $question])
        @endif
        <ul class="list-unstyled" style="display: none" id="answers-{{ $question->id }}">
            @foreach($question->answers as $answer)
                @include('courses._answer', $question)
            @endforeach
        </ul>

        <div id="answerForm-{{ $question->id }}" class="pt-2" style="display: none">
            @include('answers.form', ['question' => $question, 'answer' => $newAnswer, 'route' => ['course.question.answers.store', $question->course, $question],
                                'method' => 'POST'])
        </div>
    </div>
</li>
@section('scripts')
<script>
    $("[data-toggle='div']").click(e => {
        $(e.target.dataset.target).slideToggle();
    })
</script>
@endsection