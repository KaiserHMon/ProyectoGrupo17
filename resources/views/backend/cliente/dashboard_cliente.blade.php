@extends('layout')

@section('contenido')

<section class="py-5 section-dashboard">
  <div class="container">

    <div class="mb-5 text-center">
      <h1 class="display-6 fw-bold">Bienvenido, {{ auth()->user()->nombre }}</h1>
      <p class="text-muted">Acá vas a encontrar tu información personal y tu historial de compras</p>
    </div>

    <div class="row g-4">

      {{-- Sidebar --}}
      <div class="col-12 col-md-3">
        <div class="card shadow-sm rounded-4 sticky-md-top card-maie-sticky">
          <div class="card-body p-3">
            <h6 class="fw-bold mb-3 dashboard-sidebar-title">Mi cuenta</h6>
            <div class="nav flex-column nav-pills maie-auth-nav gap-1" id="clienteTabs" role="tablist">
              <button class="nav-link active text-start" data-bs-toggle="pill" data-bs-target="#panel-perfil" type="button" role="tab">
                Mis datos
              </button>
              <button class="nav-link text-start" data-bs-toggle="pill" data-bs-target="#panel-compras" type="button" role="tab">
                Mis compras
              </button>
            </div>
          </div>
        </div>
      </div>

      {{-- Contenido --}}
      <div class="col-12 col-md-9">
        <div class="tab-content">

          {{-- Panel: Mis datos --}}
          <div class="tab-pane fade show active" id="panel-perfil" role="tabpanel">
            <div class="card shadow-sm rounded-4 card-maie">
              <div class="card-body p-4 p-md-5">
                <h2 class="h5 fw-bold mb-1">Mis datos</h2>
                <p class="text-muted mb-4" style="font-size:.9rem;">Tu información personal registrada en la plataforma.</p>

                <div class="row g-3">
                  <div class="col-12 col-sm-6">
                    <label class="form-label fw-semibold text-maie" style="font-size:.85rem;">Nombre</label>
                    <p class="mb-0 fw-bold">{{ auth()->user()->nombre }}</p>
                  </div>
                  <div class="col-12 col-sm-6">
                    <label class="form-label fw-semibold text-maie" style="font-size:.85rem;">Correo electrónico</label>
                    <p class="mb-0 fw-bold">{{ auth()->user()->email }}</p>
                  </div>
                  <div class="col-12 col-sm-6">
                    <label class="form-label fw-semibold text-maie" style="font-size:.85rem;">Rol</label>
                    <p class="mb-0">
                      <span class="badge rounded-pill" style="background-color:#622b16;">
                        cliente
                      </span>
                    </p>
                  </div>
                  <div class="col-12 col-sm-6">
                    <label class="form-label fw-semibold text-maie" style="font-size:.85rem;">Miembro desde</label>
                    <p class="mb-0 fw-bold">{{ auth()->user()->created_at->format('d/m/Y') }}</p>
                  </div>
                </div>

              </div>
            </div>
          </div>

          {{-- Panel: Mis compras --}}
          <div class="tab-pane fade" id="panel-compras" role="tabpanel">
            <div class="card shadow-sm rounded-4 card-maie">
              <div class="card-body p-4 p-md-5">
                <h2 class="h5 fw-bold mb-1">Mis compras</h2>
                <p class="text-muted mb-4" style="font-size:.9rem;">Historial de todas tus compras realizadas.</p>

                <div class="table-responsive">
                  <table class="table table-hover align-middle" style="font-size:.9rem;">
                    <thead>
                      <tr style="border-bottom: 2px solid rgba(98,43,22,0.15);">
                        <th class="fw-semibold text-maie">Orden</th>
                        <th class="fw-semibold text-maie">Productos</th>
                        <th class="fw-semibold text-maie">Total</th>
                        <th class="fw-semibold text-maie">Estado</th>
                        <th class="fw-semibold text-maie">Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($ventas->isEmpty())
                      <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Todavía no realizaste ninguna compra.</td>
                      </tr>
                      @else
                      @foreach($ventas as $venta)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                          @foreach($venta->detalles as $detalle)
                            {{ $detalle->producto->nombre ?? 'Producto eliminado' }} (x{{ $detalle->cantidad }})<br>
                          @endforeach
                        </td>
                        <td>${{ number_format($venta->total, 2) }}</td>
                        <td>{{ ucfirst($venta->estado) }}</td>
                        <td>{{ $venta->created_at->format('d/m/Y') }}</td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

@endsection