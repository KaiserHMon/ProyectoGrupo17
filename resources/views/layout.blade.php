<!DOCTYPE html>
<html lang="es">

@include('templates.head')

<body>
    @include('templates.navbar')

    <main>
    <!-- Contenido específico de cada página -->
        @yield('contenido')
    </main>

    @include('templates.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
