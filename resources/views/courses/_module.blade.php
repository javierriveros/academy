<div class="module mt-1 mb-4">
    <h4 class="module__title">
        {{ $module->title }}
        @auth
            @if(Auth::user()->isTeacher() && Auth::user()->id == $module->course->teacher_id || Auth::user()->isAdmin())
                <a href="{{ route('admin.modules.edit', [$course,$module]) }}" class="module__action text-info" title="Editar módulo"><i class="fas fa-pen-square"></i></a>
                <a href="{{ route('admin.topics.create', [$course]) }}" class="module__action text-success" title="Agregar tema"><i class="fas fa-plus-circle"></i></a>
            @endif
            @if(Auth::user()->isAdmin())
                @include('admin.modules._delete', [$module])
            @endif
        @endauth
    </h4>
    <p class="module__description">{!! html_entity_decode($module->description) !!}</p>
    <ul class="list-group module__topics">
        @forelse($module->topics as $topic)
            @include('topics._topic', $topic)
        @empty
            <p>Aún no hay temas agregados</p>
        @endforelse
    </ul>
</div>
