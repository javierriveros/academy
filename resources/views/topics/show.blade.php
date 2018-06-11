@extends('layouts.app') 
@section('facebook')
<meta property="og:url" content="{{ URL::current() }}">
<meta property="og:title" content="{{ $topic->title}} | Corocora (Aula Virtual)">
<meta property="og:type" content="website">
{{-- <meta property="og:description" content="{{ $topic->description }}"> --}}
<meta property="og:site_name" content="corocora">
<meta property="og:image" content="{{ asset('img/logo.png') }}">
@endsection
 
@section('twitter')
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@corocora_av">
<meta name="twitter:title" content="{{ $topic->title}} | Corocora (Aula Virtual)">
{{-- <meta name="twitter:description" content="{{ $topic->description }}"> --}}
<meta name="twitter:image" content="{{ asset('img/logo.png') }}">
@endsection
 
@section('content')
<section class="page-header page-header__front">
    <img src="{{ asset('img/banner-home-v2.jpg') }}" alt="" class="page-header__img">
    <div class="container page-header__data">
        <div class="row justify-content-center align-items-center">
            <h1 class="page-header__title">{{ $topic->title }}</h1>
        </div>
    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <article class="topic__content">
                {!!html_entity_decode($topic->content)!!}
            </article>
        </div>
    </div>
</div>
@endsection