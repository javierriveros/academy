<article class="card">
    <div class="card-img-top">
        <a href="{{ url('courses/' . $course->id) }}">
            @if($course->picture)
                <img src="{{ asset($course->picture) }}" alt="{{ $course->name }}" class="img-responsive">
            @endif
        </a>
    </div>
    <div class="card-body">
        <div class="card-title"><a href="{{ route('courses.show', $course) }}" hreflang="es">{{ $course->name }}</a></div>

        <footer class="card-footer d-flex justify-content-between align-items-center" style="border-top: 1px solid #dfe0e0;padding-left:0;padding-right:0;padding-bottom:0;background-color:transparent">
            <div>
                <img src="http://via.placeholder.com/25x25" alt="Álvaro Felipe - Profesor y Web Designer en EDteam" typeof="Image" width="25" height="25" class="rounded-circle">
                <span class="ml-1">{{ $course->teacher->name }}</span>
            </div>
            {{--
            <article typeof="Person" about="/profesores/alvaro-felipe" class="curso__teacher">
                <div class="card__user-img curso__teacher-img">
                    <div>
                        <a href="/profesores/alvaro-felipe">
                                        <img src="https://ed.team/sites/default/files/styles/thumbnail/public/pictures/2017-11/alvaro_0.jpg?itok=4M1cv5mv" alt="Álvaro Felipe - Profesor y Web Designer en EDteam" typeof="Image" width="100" height="100">
                                    </a>
                    </div>
                </div>
                <div class="card__user-name curso__teacher-name">
                    <div>Álvaro Felipe</div>
                </div>
            </article> --}}
            <a href="{{ url('courses/' . $course->id) }}" class="btn btn-info btn-sm">Ver más</a>
        </footer>
    </div>
</article>