@extends('layout')

{{-- Página principal con presentación de la empresa y catálogo destacado --}}
@section('contenido')

{{-- Sección hero: Presentación principal de la empresa con carrusel de imágenes --}}
<section class="section-hero">
<div class="container">
    <div class="row align-items-center g-5">
        <div class="col-lg-6">
            <h1 class="display-4 fw-bold mb-3">Maie Dulces Artesanales</h1>
            <p class="lead mb-4">Descubre el sabor de la tradición y el amor en cada bocado. Nuestra repostería artesanal está pensada para crear momentos inolvidables.</p>
        </div>
        <div class="col-lg-6">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner shadow-lg rounded-4">
                    <div class="carousel-item active">
                        <img class="d-block w-100 hero-carousel-img" src="{{ asset('images/productos/maie-91.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 hero-carousel-img" src="{{ asset('images/productos/maie-100.jpg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 hero-carousel-img" src="{{ asset('images/productos/maie-115.jpeg') }}" alt="Third slide">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

{{-- Sección de productos: Muestra los 4 tipos de productos principales con imágenes --}}
<section class="section-products">
<div class="container">
<p class="text-center mb-1 small" style="letter-spacing: 1px; text-transform: uppercase;">Elige tu favorito</p>
<h1 class="display-6 fw-bold lh-1 mb-5 text-center">Nuestros Productos</h1>
<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card h-100 border-0 bg-transparent">
        <img src="/images/productos/alfajor-negro-relleno-de-dulce-de-leche.jpg" class="card-img-top rounded-4 shadow" alt="alfajor">
      <div class="card-body">
        <h5 class="card-title fw-bold">Alfajores</h5>
        <p class="card-text">Deliciosos alfajores artesanales con distintos rellenos. Una golosina tradicional e irresistible.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 border-0 bg-transparent">
      <img src="/images/productos/crumbl-cookies.jpg" class="card-img-top rounded-4 shadow" alt="crumbl cookie">
      <div class="card-body">
        <h5 class="card-title fw-bold">Crumbl Cookies</h5>
        <p class="card-text">Galletas grandes y blandas con una textura crujiente en los bordes.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 border-0 bg-transparent">
      <img src="/images/productos/bigstock-Set-Of-Different-Multi-colored-276330859-e1581253559904.jpg" class="card-img-top rounded-4 shadow" alt="macarrón">
      <div class="card-body">
        <h5 class="card-title fw-bold">Macarrón</h5>
        <p class="card-text">Elegantes macarrones artesanales con sabores variados y auténticos.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 border-0 bg-transparent">
      <img src="/images/productos/cono.jpg" class="card-img-top rounded-4 shadow" alt="cono de dulce de leche">
      <div class="card-body">
        <h5 class="card-title fw-bold">Conitos</h5>
        <p class="card-text">Conos crujientes con rellenos irresistibles. Un toque gourmet que combina la textura crujiente del barquillo con sabores inigualables.</p>
      </div>
    </div>
  </div>
</div>
<div class="text-center mt-3">
  <a href="/catalogo" class="btn btn-custom rounded px-4 py-2">Ver Catálogo</a>
</div>
</div>
</section>


@endsection
