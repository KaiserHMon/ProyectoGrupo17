@extends('layout')

@section('contenido')

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5 text-center">
                    <div class="mb-4">
                        <i class="bi bi-bag-check-fill text-success" style="font-size: 4rem;"></i>
                    </div>
                    <h1 class="fw-bold mb-4">¡Compra realizada con éxito!</h1>

                    <div class="fs-5 text-muted mb-4">
                        <p>Hola <strong>{{ $nombre }}</strong>, ¡gracias por tu compra!</p>
                        <p>Pronto nos pondremos en contacto para coordinar la entrega.</p>
                    </div>

                    <hr class="my-4">

                    <p class="mb-4">¡Muchas gracias por elegir Maie!</p>

                    @if(isset($ventaId))
                        <div class="mb-4">
                            <a href="{{ route('venta.comprobante', $ventaId) }}" class="btn btn-custom btn-lg px-5 py-3 shadow fw-bold">
                                <i class="bi bi-file-earmark-pdf-fill me-2"></i> Descargar Comprobante PDF
                            </a>
                        </div>
                    @endif

                    <a href="{{ url('/') }}" class="btn btn-outline-dark px-4 py-2" style="border-radius: 50px;">
                        Volver al inicio
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
