@extends('layout')

{{-- Catálogo completo de productos disponibles --}}
@section('contenido')
{{-- Encabezado del catálogo con título y descripción --}}
<div class="container py-5">
    <h1 class="display-5 fw-bold mb-3 text-center">Catálogo de <span class="fst-italic fw-bold text-maie">Tentaciones</span></h1>
    <p class="lead text-center mb-5">Descubre nuestra exquisita selección de delicias artesanales, preparadas con amor y los mejores ingredientes.</p>

    {{-- Grid de productos: Muestra todas las delicias disponibles en tarjetas --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-5">
        @foreach($productos as $producto)
        <div class="col">
            <div class="card h-100 shadow-sm card-catalogo rounded-4">
                {{-- Validamos si existe la imagen, de lo contrario usamos una por defecto --}}
                @php
                    $imagenPath = $producto->imagen ? 'images/productos/' . $producto->imagen : 'images/productos/maie-1.jpg';
                @endphp
                <img src="{{ asset($imagenPath) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-center">{{ $producto->nombre }}</h5>
                    <p class="card-text text-center flex-grow-1">{{ $producto->descripcion }}</p>
                    <p class="fw-bold text-center text-maie mt-auto mb-0">$ {{ number_format($producto->precio, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
