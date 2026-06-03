@extends('layout')

@section('contenido')
<div class="container py-5">
    <h1 class="display-5 fw-bold mb-4 text-center">Mi <span class="fst-italic fw-bold text-maie">Carrito</span></h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(!$cabecera || $cabecera->detalles->isEmpty())
        <div class="text-center py-5">
            <p class="lead mb-4">Tu carrito está vacío.</p>
            <a href="{{ url('/catalogo') }}" class="btn btn-custom px-4 py-2 rounded-pill">Ir al Catálogo</a>
        </div>
    @else
        <div class="table-responsive shadow-sm rounded-4 mb-4">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>Producto</th>
                        <th class="text-center">Precio Unitario</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cabecera->detalles as $detalle)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                @php
                                    $imagenPath = $detalle->producto->imagen 
                                        ? 'storage/productos/' . $detalle->producto->imagen 
                                        : 'images/productos/maie-1.jpg';
                                @endphp
                                <img src="{{ asset($imagenPath) }}" alt="{{ $detalle->producto->nombre }}" class="rounded-3 me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                <div>
                                    <h6 class="mb-0">{{ $detalle->producto->nombre }}</h6>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">$ {{ number_format($detalle->precio_unitario, 2, ',', '.') }}</td>
                        <td class="text-center">
                            <form action="{{ route('carrito.update', $detalle->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('PATCH')
                                <div class="input-group input-group-sm" style="max-width: 120px; margin: 0 auto;">
                                    <button class="btn btn-outline-secondary px-2" type="submit" name="action" value="decrease" {{ $detalle->cantidad <= 1 ? 'disabled' : '' }}>
                                        <i class="bi bi-dash-lg"></i>
                                    </button>
                                    <input type="text" class="form-control text-center bg-light border-secondary fw-bold" value="{{ $detalle->cantidad }}" readonly style="width: 40px; padding: 0.25rem;">
                                    <button class="btn btn-outline-secondary px-2" type="submit" name="action" value="increase" {{ $detalle->cantidad >= $detalle->producto->stock ? 'disabled' : '' }}>
                                        <i class="bi bi-plus-lg"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                        <td class="text-center fw-bold">$ {{ number_format($detalle->cantidad * $detalle->precio_unitario, 2, ',', '.') }}</td>
                        <td class="text-center">
                            <form action="{{ route('carrito.destroy', $detalle->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto del carrito?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0 rounded-circle p-2" title="Eliminar producto">
                                    <i class="bi bi-trash3-fill fs-5"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-light fw-bold">
                    <tr>
                        <td colspan="4" class="text-end py-3 fs-5">Total:</td>
                        <td colspan="2" class="text-center py-3 fs-5 text-maie">$ {{ number_format($cabecera->total, 2, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <a href="{{ url('/catalogo') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill me-2">Seguir Comprando</a>
                <form action="{{ route('venta.cancelar') }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas cancelar la compra? Se vaciará todo el carrito.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger px-4 py-2 rounded-pill">Cancelar Compra</button>
                </form>
            </div>
            <form action="{{ route('venta.confirmar') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-custom px-5 py-2 rounded-pill fw-bold">Finalizar Compra</button>
            </form>
        </div>
    @endif
</div>
@endsection
