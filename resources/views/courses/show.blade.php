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
            <img src="{{ asset($course->picture) }}" alt="{{ $course->name }}" class="page-header__img" class="page-header__img"> 
        @else
            <img src="{{ asset('img/banner-home-v2.jpg') }}" alt="" class="page-header__img">
        @endif
        <div class="container page-header__data">
            <div class="row justify-content-center align-items-center">
                <h2 class="page-header__title">{{ $course->name }}</h2>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title">Acerca de {{ $course->name }}</h4>
                        <p class="card-text">{!!html_entity_decode($course->description)!!}</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @forelse($course->modules()->get() as $module)
                            <div class="module">
                                <h4 class="module__title">
                                    {{ $module->title }}
                                    @auth
                                        @if(Auth::user()->isTeacher())
                                            <a href="{{ route('admin.modules.edit', [$course,$module]) }}" class="module__action text-info"><i class="fas fa-pen-square"></i></a>
                                        @endif
                                        @if(Auth::user()->isAdmin())
                                            <form action="{{ route('admin.modules.delete', [$course, $module]) }}" class="d-inline-block" method="POST">
                                                @method('DELETE') 
                                                @csrf
                                                <button type="submit" class="no-style module__action text-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </h4>
                                <p class="module__description">{!! html_entity_decode($module->description) !!}</p>
                                <ul class="list-group module__topics">
                                    @forelse($module->topics()->get() as $topic)
                                        <li class="list-group-item topic d-flex justify-content-between">
                                            <a href="#" class="topic__title">{{ $topic->title }}</a>
                                            <div class="pull-right">
                                                @auth
                                                    @if(Auth::user()->isTeacher())
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
                                    @empty
                                        <p>No topics available</p>
                                    @endforelse
                                </ul>
                            </div>
                        @empty
                            <p>No hay módulos disponibles</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection