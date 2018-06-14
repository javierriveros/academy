@extends('layouts.app')

@section('facebook')
<meta property="og:url" content="{{ URL::current() }}">
<meta property="og:title" content="{{ $course->name}} | Corocora (Aula Virtual)">
<meta property="og:type" content="website">
<meta property="og:description" content="{{ $course->description }}">
<meta property="og:site_name" content="corocora">
<meta property="og:image" content="{{ asset('img/logo.png') }}">
@endsection

@section('twitter')
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@corocora_av">
<meta name="twitter:title" content="{{ $course->name}} | Corocora (Aula Virtual)">
<meta name="twitter:description" content="{{ $course->description }}">
<meta name="twitter:image" content="{{ asset('img/logo.png') }}">
@endsection

@section('content')
    <section class="page-header page-header__front">
        @if($course->picture)
            <img src="{{ asset($course->picture) }}" alt="Portada del curso: {{ $course->name }}" class="page-header__img" class="page-header__img">
        @else
            <img src="{{ asset('img/banner-home-v2.jpg') }}" alt="Portada del curso: {{ $course->name }}" class="page-header__img">
        @endif
        <div class="container page-header__data">
            <div class="row justify-content-center align-items-center">
                <h2 class="page-header__title">{{ $course->name }}</h2>
            </div>
        </div>
    </section>
    <div class="container course">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-9">
                <ul class="nav course__nav nav-tabs" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-info-tab" data-toggle="pill" href="#pills-info" role="tab" aria-controls="pills-home"
                            aria-selected="true">Información del curso</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-forum-tab" data-toggle="pill" href="#pills-forum" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Foro</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <section class="tab-pane show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                        <div class="card mb-3 course__content">
                            <div class="card-body">
                                <h4 class="card-title">Acerca de {{ $course->name }}</h4>
                                <p class="card-text">{!!html_entity_decode($course->description)!!}</p>

                                <div class="d-flex align-items-center justify-content-between pt-3" style="border-top: 1px solid rgba(0,0,0,.2);">
                                    <div class="d-flex align-items-center">
                                        @if ($course->teacher->picture)
                                            <img src="{{ asset($course->teacher->picture) }}" alt="Imágen de perfil de {{ $course->teacher->name }}" class="rounded-circle" style="max-width: 70px">
                                        @else
                                            <img src="{{ asset('img/avatar-robot.png') }}" alt="Imágen de perfil de {{ $course->teacher->name }}" class="rounded-circle" style="max-width: 70px">
                                        @endif
                                        <div class="ml-2">
                                            <span>{{ $course->teacher->name }}</span>
                                            <small class="text-muted d-block">Docente titular</small>
                                        </div>
                                    </div>
                                    @if(Auth::user() && Auth::user()->type == 1)
                                        @if(!$course->isEnrolled)
                                            <form action="{{ route('courses.enroll', $course) }}" class="d-inline-block" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Matricular</button>
                                            </form>
                                        @else
                                            <form action="{{ route('courses.unenroll', $course) }}" class="d-inline-block" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                @forelse($course->modules as $module)
                                    @include('courses._module', $module)
                                @empty
                                    <p>Aún no hay módulos disponibles</p>
                                @endforelse
                            </div>
                        </div>
                    </section>
                    <section class="tab-pane" id="pills-forum" role="tabpanel" aria-labelledby="pills-forum-tab">
                        <article class="course__content card">
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    @forelse($course->questions as $question)
                                        @include('courses._question', $question)
                                    @empty
                                    <p>No hay preguntas</p>
                                    @endforelse
                                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#addQuestionModal">
                                      Añadir pregunta
                                    </button>
                                </div>
                            </div>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="addQuestionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQuestionModalLabel">Agregar pregunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('questions.form', ['course' => $course, 'question' => $newQuestion, 'route' => ['course.questions.store', $course->id],
                    'method' => 'POST'])
                </div>
            </div>
        </div>
    </div>
@endsection
