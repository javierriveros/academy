    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Corocora') }}</title>

    <!-- Favicon section -->
    @include('partials.favicon')

    <meta name="description" content="Corocora (Aula Virtual) es una página web con cursos sobre distintos temas donde se puede llevar el control de notas de los estudiantes que toman cada curso."
    />
    <meta name="subject" content="Aula virtual">
    <meta name="keywords" content="aula virtual, cursos, plataforma">
    <meta name="author" content="Javier Riveros">
    <meta name="language" content="es">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="http://localhost:8000" />
    @yield('facebook')
    @yield('twitter')

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">