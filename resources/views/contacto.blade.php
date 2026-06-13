@extends('layout')

{{-- Información de contacto del local con mapa interactivo y vías de comunicación --}}
@section('contenido')

<div class="container py-5">
    <!-- Encabezado de la Página -->
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-3" style="font-family: 'Noto Serif', serif; color: #622b16;">Contacto</h1>
        <p class="text-muted mx-auto" style="max-width: 650px; font-size: 1.1rem; line-height: 1.6;">
            ¡Nos encantaría escucharte! Visitá nuestro local comercial en Corrientes o contactanos a través de cualquiera de nuestros canales oficiales.
        </p>
    </div>

    <!-- Sección del Mapa -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-body p-0">
                    <iframe 
                        src="https://maps.google.com/maps?q=Rivadavia%201189,%20Corrientes,%20Argentina&t=&z=16&ie=UTF8&iwloc=&output=embed" 
                        width="100%" 
                        height="450" 
                        style="border:0; display: block;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Ubicación de Maie en Google Maps">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjetas de Información de Contacto -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row g-4">
                
                <!-- Tarjeta: Ubicación -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 contact-card">
                        <div class="icon-wrapper mx-auto mb-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-geo-alt-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Nuestra Tienda</h5>
                        <p class="text-muted small mb-3">Vení a visitarnos y conocé todos nuestros productos en persona.</p>
                        <a href="https://maps.google.com/?q=Rivadavia 1189, Corrientes" target="_blank" class="fw-bold text-decoration-none contact-link mt-auto" style="color: #9A4600; font-size: 0.95rem;">
                            Rivadavia 1189,<br>Corrientes
                        </a>
                    </div>
                </div>

                <!-- Tarjeta: WhatsApp -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 contact-card">
                        <div class="icon-wrapper mx-auto mb-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-whatsapp fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-2">WhatsApp</h5>
                        <p class="text-muted small mb-3">Escribinos para hacer consultas rápidas o coordinar pedidos especiales.</p>
                        <a href="https://wa.me/5493794004039" target="_blank" class="fw-bold text-decoration-none contact-link mt-auto" style="color: #9A4600; font-size: 0.95rem;">
                            +54 9 3794 00-4039
                        </a>
                    </div>
                </div>

                <!-- Tarjeta: Email -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 contact-card">
                        <div class="icon-wrapper mx-auto mb-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Email</h5>
                        <p class="text-muted small mb-3">Mandanos tus dudas, sugerencias o propuestas por correo electrónico.</p>
                        <a href="mailto:maie.dulces@gmail.com" class="fw-bold text-decoration-none contact-link text-break mt-auto" style="color: #9A4600; font-size: 0.95rem;">
                            maie.dulces@gmail.com
                        </a>
                    </div>
                </div>

                <!-- Tarjeta: Instagram -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 contact-card">
                        <div class="icon-wrapper mx-auto mb-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-instagram fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Instagram</h5>
                        <p class="text-muted small mb-3">Seguinos en nuestras redes para ver novedades y sorteos diarios.</p>
                        <a href="https://www.instagram.com/maie.alfajores/" target="_blank" class="fw-bold text-decoration-none contact-link mt-auto" style="color: #9A4600; font-size: 0.95rem;">
                            @maie.alfajores
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
