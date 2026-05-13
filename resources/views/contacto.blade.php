@extends('layout')

{{-- Formulario de contacto para consultas y trabajos --}}
@section('contenido')

{{-- Contenedor principal: Título y descripción del formulario --}}
<div class="container pb-2">
    <h1 class="text-center fw-bold mt-5">Contacto</h1>
    <p class="text-center mt-5">Si deseas trabajar con nosotros o sos proveedor, completá el formulario y nos pondremos en contacto a la brevedad</p>
{{-- Formulario: Campos para nombre, motivo, email y mensaje --}}
<div class="card mt-4 shadow-lg rounded">
    <div class="card-body">
         <form action="{{ url('/contacto') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre">
            </div>

            <div class="mb-3">
                <label class="form-label">Motivo</label>
                <input type="text" name="motivo" class="form-control" placeholder="Ingrese el motivo">
            </div>

            <div class="mb-3">
                <label class="form-label">Correo Electronico</label>
                <input type="email" name="email" class="form-control" placeholder="Ingrese su correo electronico">
            </div>

            <div class="mb-3">
                <label class="form-label">Mensaje - (NO OBLIGATORIO)</label>
                <textarea name="mensaje" class="form-control" rows="3" placeholder="Si desea aportar datos extra, escribalos aqui"></textarea>
            </div>
            <button type="submit" class="btn btn-custom">
                Enviar mensaje
             </button>
         </form>
    </div>
</div>
</div>

@endsection
