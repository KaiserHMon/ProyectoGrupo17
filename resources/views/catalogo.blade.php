@extends('layout')

{{-- Catálogo completo de productos disponibles --}}
@section('contenido')
{{-- Encabezado del catálogo con título y descripción --}}
<div class="container py-5">
    <h1 class="display-5 fw-bold mb-3 text-center">Catálogo de <span class="fst-italic fw-bold text-maie">Tentaciones</span></h1>
    <p class="lead text-center mb-5">Descubre nuestra exquisita selección de delicias artesanales, preparadas con amor y los mejores ingredientes.</p>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(count($productos) > 0)
        {{-- Grid de productos: Muestra todas las delicias disponibles en tarjetas --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-5">
            @foreach($productos as $producto)
            @php
                $isOutOfStock = $producto->stock <= 0;
                $imagenPath = $producto->imagen 
                    ? 'storage/productos/' . $producto->imagen 
                    : 'images/productos/maie-1.jpg';
            @endphp
            <div class="col">
                <div class="card h-100 shadow-sm card-catalogo rounded-4 {{ $isOutOfStock ? 'card-out-of-stock' : '' }}">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset($imagenPath) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                        @if($isOutOfStock)
                            <span class="badge badge-out-of-stock position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill shadow-sm">Sin Stock</span>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center">{{ $producto->nombre }}</h5>
                        <p class="card-text text-center flex-grow-1">{{ $producto->descripcion }}</p>
                        <p class="fw-bold text-center text-maie mt-auto mb-3">$ {{ number_format($producto->precio, 2, ',', '.') }}</p>
                        
                        @if($isOutOfStock)
                            <button class="btn btn-out-of-stock w-100 rounded-pill py-2" disabled>Agotado</button>
                        @elseif(Auth::check() && Auth::user()->rol->nombre === 'admin')
                            <button class="btn btn-outline-secondary w-100 rounded-pill py-2" disabled style="cursor: not-allowed;">Solo Clientes</button>
                        @else
                            <form action="{{ route('carrito.add', $producto->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-custom w-100 rounded-pill">Añadir al Carrito</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <div class="card border-0 shadow-sm rounded-4 p-5 mx-auto" style="max-width: 600px; background-color: #fff8f5; border: 1px solid rgba(98, 43, 22, 0.05) !important;">
                <div class="mb-4">
                    <i class="bi bi-cookie text-maie" style="font-size: 4.5rem; filter: drop-shadow(0px 2px 4px rgba(154, 70, 0, 0.2));"></i>
                </div>
                <h3 class="fw-bold mb-3 text-maie">Nuestra cocina está preparándose</h3>
                <p class="lead mb-4 text-muted" style="font-size: 1.05rem;">
                    En este momento no disponemos de productos listos en el catálogo. Estamos horneando nuevas delicias artesanales para ti. ¡Vuelve muy pronto!
                </p>
                <div>
                    <a href="{{ url('/') }}" class="btn btn-custom px-4 py-2 rounded-pill shadow-sm">Volver al Inicio</a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
