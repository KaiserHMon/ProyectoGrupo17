@extends('layout')

{{-- Catálogo completo de productos disponibles --}}
@section('contenido')
{{-- Encabezado del catálogo con título y descripción --}}
<div class="container py-5">
    <h1 class="display-5 fw-bold mb-3 text-center">Catálogo de <span class="fst-italic fw-bold text-maie">Tentaciones</span></h1>
    <p class="lead text-center mb-5">Descubre nuestra exquisita selección de delicias artesanales, preparadas con amor y los mejores ingredientes.</p>

    {{-- Grid de productos: Muestra todas las delicias disponibles en tarjetas --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-5">
        <div class="col">
            <div class="card h-100 shadow-sm card-catalogo rounded-4">
                <img src="/images/productos/maie-93.jpg" class="card-img-top" alt="Alfajor negro">
                <div class="card-body">
                    <h5 class="card-title text-center">Maie Negro</h5>
                    <p class="card-text text-center">Alfajor con cobertura de chocolate negro, cremoso y exquisito.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm card-catalogo rounded-4">
                <img src="/images/productos/maie-95.jpg" class="card-img-top" alt="Alfajor blanco">
                <div class="card-body">
                    <h5 class="card-title text-center">Maie Blanco</h5>
                    <p class="card-text text-center">Alfajor con cobertura de chocolate blanco, suave y delicioso.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm card-catalogo rounded-4">
                <img src="/images/productos/maie-rojo.jpeg" class="card-img-top" alt="Alfajor frutos rojos">
                <div class="card-body">
                    <h5 class="card-title text-center">Maie Frutos Rojos</h5>
                    <p class="card-text text-center">Alfajor con relleno de frutos rojos, frutal y refrescante.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm card-catalogo rounded-4">
                <img src="/images/productos/conitos-manfrey2.jpg" class="card-img-top" alt="Conitos">
                <div class="card-body">
                    <h5 class="card-title text-center">Cono Tentacion</h5>
                    <p class="card-text text-center">El clásico conito de dulce de leche que tanto amas.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm card-catalogo rounded-4">
                <img src="/images/productos/crumbl-pistacchio.webp" class="card-img-top" alt="Cookie pistachio">
                <div class="card-body">
                    <h5 class="card-title text-center">Cookie Pistachio</h5>
                    <p class="card-text text-center">Crumbl Cookie gigante con sabor a pistacho, crocante y sofisticada.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm card-catalogo rounded-4">
                <img src="/images/productos/crumbl-classic.jpg" class="card-img-top" alt="Cookie clásica">
                <div class="card-body">
                    <h5 class="card-title text-center">Classic Cookie</h5>
                    <p class="card-text text-center">Crumbl Cookie de mantequilla tradicional, irresistible y adictiva.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm card-catalogo rounded-4">
                <img src="/images/productos/macarons-chocolate.jpg" class="card-img-top" alt="Macarrón chocolate">
                <div class="card-body">
                    <h5 class="card-title text-center">Macaron Au Chocolat</h5>
                    <p class="card-text text-center">Macarrón relleno de chocolate, dulce y clásico.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm card-catalogo rounded-4">
                <img src="/images/productos/macaron-framboise.jpg" class="card-img-top" alt="Macaron frambuesa">
                <div class="card-body">
                    <h5 class="card-title text-center">Macaron Aux Framboises</h5>
                    <p class="card-text text-center">Macarrón relleno de frambuesa, fresco y elegante.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
