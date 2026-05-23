@extends('layout')

@section('contenido')

<div class="container pb-2">
    <h1 class="text-center fw-bold mt-5">Consultas</h1>
    <p class="text-center">¿Tenes alguna duda sobre nuestros productos? ¡Escribinos!</p>
    <p class="text-center mt-2">Nos pondremos en contacto lo antes posible</p>
<div class="card mt-4 shadow-lg rounded">
    <div class="card-body">
         <form action="{{ url('/consultas') }}" method="POST"> 
            @csrf
            <div class="mb-3"> 
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre">
            </div>

            <div class="mb-3"> 
                <label class="form-label">Numero de telefono</label> 
                <input type="number" name="telefono" class="form-control" placeholder="Ingrese su numero">
            </div>

            <div class="mb-3"> 
                <label class="form-label">Correo Electronico</label>
                <input type="email" name="email" class="form-control" placeholder="Ingrese su correo electronico">
            </div>
            
            <div class="mb-3"> 
                <label class="form-label">Mensaje</label> 
                <textarea name="mensaje" class="form-control" rows="3" placeholder="Escriba su consulta aqui"></textarea> 
            </div>        
            <button type="submit" class="btn btn-custom">
                Enviar mensaje
             </button> 
         </form>    
    </div>
</div>
</div> 

@endsection