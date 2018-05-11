<div class="card">
    <a href="{{ url('courses/' . $course->id) }}"><img src="http://place-hold.it/500x250" alt="" class="card-img-top"></a>
    <div class="card-body">
        <h5 class="card-title"><a href="{{ url('courses/' . $course->id) }}">{{ $course->name }}</a></h5>
        <p class="card-text">
            <p class="mb-1">{{ str_limit($course->description, $limit = 70, $end = '...') }}</p>
            <small class="text-muted d-block">Creado {{ $course->created_at->diffForHumans()  }}</small>
        </p>
        <a href="{{ url('courses/' . $course->id) }}" class="btn btn-info btn-sm">Ver más</a>
    </div>
</div>