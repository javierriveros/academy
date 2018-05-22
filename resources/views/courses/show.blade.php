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
                            <h4>{{ $module->title }}</h4>
                            <p>{!! html_entity_decode($module->description) !!}</p>
                            <ul class="list-group">
                                @forelse($module->topics()->get() as $topic)
                                    <li class="list-group-item"><a href="#">{{ $topic->title }}</a></li>
                                @empty
                                    <p>No topics available</p>
                                @endforelse
                            </ul>
                        @empty
                            <p>No modules available</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection