<!DOCTYPE html>
<html lang="es">

<head>
    @include('partials.head')
</head>

<body>
    <div id="app">
        @include('partials.nav')
        @include('flash::message')
        <main class="pt-2">
            @yield('content')
        </main>
        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendors/prism/prism.min.js') }}"></script>
    @yield('scripts')
</body>

</html>