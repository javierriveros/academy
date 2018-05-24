<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('partials.head')
</head>

<body>
    <div id="app">
    @include('partials.nav')

        <main class="pt-2">
            @yield('content')
        </main>
    @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
    @yield('scripts')
</body>

</html>