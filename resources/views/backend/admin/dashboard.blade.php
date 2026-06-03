@extends('layout')

@section('contenido')

<section class="py-5" style="background-color: #FCF9F4; min-height: 80vh;">
  <div class="container">

    <div class="mb-5 text-center">
      <h1 class="display-6 fw-bold">Panel de <span class="fst-italic text-maie">Administración</span></h1>
      <p class="text-muted">Gestioná tus productos. Revisa tus usuarios, ventas y consultas.</p>
    </div>

    <div class="row g-4">

      {{-- Sidebar --}}
      <div class="col-12 col-md-3">
        <div class="card shadow-sm rounded-4 sticky-md-top" style="border: 1px solid rgba(98,43,22,0.1); background:#fff; top: 20px;">
          <div class="card-body p-3">
            <h6 class="fw-bold mb-3" style="color:#622b16; font-family:'Noto Serif',serif; font-size:0.85rem; text-transform:uppercase; letter-spacing:.05em;">Acciones</h6>
            <div class="nav flex-column nav-pills maie-auth-nav gap-1" id="adminTabs" role="tablist">
              <button class="nav-link {{ ($activeTab ?? 'productos') === 'productos' ? 'active' : '' }} text-start" data-bs-toggle="pill" data-bs-target="#panel-productos" type="button" role="tab">
                Productos
              </button>
              <button class="nav-link {{ ($activeTab ?? 'productos') === 'usuarios' ? 'active' : '' }} text-start" data-bs-toggle="pill" data-bs-target="#panel-usuarios" type="button" role="tab">
                Usuarios Registrados
              </button>
              <button class="nav-link {{ ($activeTab ?? 'productos') === 'ventas' ? 'active' : '' }} text-start" data-bs-toggle="pill" data-bs-target="#panel-ventas" type="button" role="tab">
                Ventas Realizadas
              </button>
            </div>
          </div>
        </div>
      </div>

      {{-- Contenido --}}
      <div class="col-12 col-md-9">
        <div class="tab-content">

          {{-- Panel de Productos --}}
          <div class="tab-pane fade {{ ($activeTab ?? 'productos') === 'productos' ? 'show active' : '' }}" id="panel-productos" role="tabpanel">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm rounded-4 mb-4" style="border: 1px solid rgba(98,43,22,0.1); background:#fff;">
              <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                    <div>
                        <h2 class="h5 fw-bold mb-1" style="color:#622b16;">Listado de Productos</h2>
                        <p class="text-muted mb-0" style="font-size:.9rem;">Gestioná los productos, su información y stock.</p>
                    </div>
                    <button class="btn btn-custom px-4 py-2 rounded-pill fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNuevoProducto" aria-expanded="false" aria-controls="collapseNuevoProducto">
                        <i class="bi bi-plus-lg me-2"></i>Nuevo Producto
                    </button>
                </div>

                {{-- Collapse para Agregar Nuevo Producto --}}
                <div class="collapse mb-4" id="collapseNuevoProducto">
                  <div class="card card-body rounded-4 p-4" style="border: 1px dashed rgba(98,43,22,0.3); background-color: #FCF9F4;">
                    <h5 class="fw-bold mb-3" style="color:#622b16;">Agregar Nuevo Producto</h5>
                    <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row g-3">
                        <div class="col-12 col-sm-6">
                          <label class="form-label text-maie fw-medium" for="nuevo-nombre">Nombre del producto</label>
                          <input type="text" id="nuevo-nombre" name="nombre" class="maie-input" placeholder="Ej: Alfajor de Limón" required>
                        </div>

                        <div class="col-12 col-sm-6">
                          <label class="form-label text-maie fw-medium" for="nuevo-precio">Precio ($)</label>
                          <input type="number" id="nuevo-precio" name="precio" class="maie-input" min="0" step="0.01" placeholder="Ej: 1500.00" required>
                        </div>

                        <div class="col-12">
                          <label class="form-label text-maie fw-medium" for="nuevo-descripcion">Descripción</label>
                          <textarea id="nuevo-descripcion" name="descripcion" class="maie-input" rows="2" placeholder="Describí el producto brevemente..." style="resize: vertical;" required></textarea>
                        </div>

                        <div class="col-12 col-sm-6">
                          <label class="form-label text-maie fw-medium" for="nuevo-stock">Stock inicial</label>
                          <input type="number" id="nuevo-stock" name="stock" class="maie-input" min="0" placeholder="Ej: 100" required>
                        </div>

                        <div class="col-12 col-sm-6">
                          <label class="form-label text-maie fw-medium" for="nuevo-imagen">Imagen del producto</label>
                          <input type="file" id="nuevo-imagen" name="imagen" class="maie-input" accept=".jpg,.jpeg,.png,image/jpeg,image/png" style="padding: 0.45rem 1rem; cursor: pointer;">
                          <div class="form-text text-muted mt-1" style="font-size: 0.78rem;">
                            <i class="bi bi-info-circle-fill text-maie me-1"></i>Formatos permitidos: <strong>JPG, JPEG, PNG</strong>. Peso máximo: <strong>2 MB</strong>.
                          </div>
                        </div>

                        <div class="col-12">
                          <div id="preview-container" class="d-none mt-2">
                            <p class="text-maie fw-medium mb-1" style="font-size:.85rem;">Vista previa:</p>
                            <img id="imagen-preview" src="#" alt="Preview" class="rounded-3" style="width:120px; height:120px; object-fit:cover; border: 2px solid rgba(98,43,22,0.2);">
                          </div>
                        </div>
                      </div>

                      <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-custom px-4 py-2 rounded-pill fw-bold">
                          Publicar Producto
                        </button>
                      </div>
                    </form>
                  </div>
                </div>

                {{-- Tabla de Productos --}}
                <div class="table-responsive">
                  <table class="table table-hover align-middle mb-0" style="font-size:.9rem;">
                    <thead>
                      <tr style="border-bottom: 2px solid rgba(98,43,22,0.15);">
                        <th class="fw-semibold text-maie">Imagen</th>
                        <th class="fw-semibold text-maie">Nombre</th>
                        <th class="fw-semibold text-maie">Precio</th>
                        <th class="fw-semibold text-maie">Stock</th>
                        <th class="fw-semibold text-maie text-end">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($productos as $producto)
                        <tr>
                          <td>
                            @php
                                $imagenPath = $producto->imagen
                                    ? 'storage/productos/' . $producto->imagen
                                    : 'images/productos/maie-1.jpg';
                            @endphp
                            <img src="{{ asset($imagenPath) }}" alt="{{ $producto->nombre }}" class="rounded-3" style="width: 50px; height: 50px; object-fit: cover; border: 1px solid rgba(98,43,22,0.1);">
                          </td>
                          <td class="fw-bold">{{ $producto->nombre }}</td>
                          <td class="fw-semibold">$ {{ number_format($producto->precio, 2, ',', '.') }}</td>
                          <td>
                            @if($producto->stock <= 10)
                                <span class="badge bg-danger px-2.5 py-1.5 rounded-pill">Bajo Stock: {{ $producto->stock }}</span>
                            @else
                                <span class="badge bg-success px-2.5 py-1.5 rounded-pill">Disponible: {{ $producto->stock }}</span>
                            @endif
                          </td>
                          <td class="text-end">
                            <button type="button" class="btn btn-sm btn-outline-secondary rounded-circle p-2 border-0 me-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEditar"
                                    data-id="{{ $producto->id }}"
                                    data-nombre="{{ $producto->nombre }}"
                                    data-descripcion="{{ $producto->descripcion }}"
                                    data-precio="{{ $producto->precio }}"
                                    data-stock="{{ $producto->stock }}"
                                    data-imagen="{{ $producto->imagen ? asset('storage/productos/' . $producto->imagen) : asset('images/productos/maie-1.jpg') }}"
                                    title="Editar producto">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar a {{ $producto->nombre }} del catálogo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-2 border-0" title="Eliminar producto">
                                    <i class="bi bi-trash3-fill text-danger fs-5"></i>
                                </button>
                            </form>
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="5" class="text-center py-4 text-muted">No hay productos registrados en el catálogo.</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>

          {{-- Usuarios Registrados --}}
          <div class="tab-pane fade {{ ($activeTab ?? 'productos') === 'usuarios' ? 'show active' : '' }}" id="panel-usuarios" role="tabpanel">
            <div class="card shadow-sm rounded-4" style="border: 1px solid rgba(98,43,22,0.1); background:#fff;">
              <div class="card-body p-4 p-md-5">
                <h2 class="h5 fw-bold mb-1" style="color:#622b16;">Usuarios Registrados</h2>
                <p class="text-muted mb-4" style="font-size:.9rem;">Listado de todos los usuarios que se han registrado en la plataforma.</p>

                @if(session('success_usuarios'))
                  <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
                    {{ session('success_usuarios') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                @if(session('error_usuarios'))
                  <div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert">
                    {{ session('error_usuarios') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <div class="table-responsive">
                  <table class="table table-hover align-middle" style="font-size:.9rem;">
                    <thead>
                      <tr style="border-bottom: 2px solid rgba(98,43,22,0.15);">
                        <th class="fw-semibold text-maie">#</th>
                        <th class="fw-semibold text-maie">Nombre</th>
                        <th class="fw-semibold text-maie">Correo</th>
                        <th class="fw-semibold text-maie">Rol</th>
                        <th class="fw-semibold text-maie">Fecha de registro</th>
                        <th class="fw-semibold text-maie text-end">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($usuarios as $usuario)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                          <span class="badge rounded-pill" style="background-color:#622b16;">
                            {{ $usuario->rol->nombre ?? 'Sin rol' }}
                          </span>
                        </td>
                        <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                        <td class="text-end">
                          @if($usuario->id !== auth()->id())
                            <div class="dropdown">
                              <button class="btn btn-sm btn-outline-secondary rounded-circle p-2 border-0"
                                      type="button"
                                      data-bs-toggle="dropdown"
                                      aria-expanded="false"
                                      title="Opciones">
                                <i class="bi bi-three-dots-vertical"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-end shadow-sm">

                                {{-- Cambiar rol --}}
                                <li>
                                  <form action="{{ route('admin.usuarios.updateRol', $usuario->id) }}" method="POST"
                                        onsubmit="return confirm('¿Cambiar el rol de {{ $usuario->nombre }} a {{ $usuario->rol->nombre === 'admin' ? 'cliente' : 'admin' }}?')">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="dropdown-item">
                                      @if($usuario->rol->nombre === 'admin')
                                        <i class="bi bi-person me-2 text-warning"></i>Hacer Cliente
                                      @else
                                        <i class="bi bi-shield-check me-2" style="color:#622b16;"></i>Hacer Admin
                                      @endif
                                    </button>
                                  </form>
                                </li>

                                <li><hr class="dropdown-divider"></li>

                                {{-- Eliminar --}}
                                <li>
                                  <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST"
                                        onsubmit="return confirm('¿Estás seguro de que querés eliminar a {{ $usuario->nombre }}? Esta acción no se puede deshacer.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">
                                      <i class="bi bi-trash3 me-2"></i>Eliminar usuario
                                    </button>
                                  </form>
                                </li>

                              </ul>
                            </div>
                          @else
                            <span class="text-muted" style="font-size:.8rem;">Vos</span>
                          @endif
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No hay usuarios registrados</td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>

          {{-- Ventas Realizadas --}}
          <div class="tab-pane fade {{ ($activeTab ?? 'productos') === 'ventas' ? 'show active' : '' }}" id="panel-ventas" role="tabpanel">
            <div class="card shadow-sm rounded-4" style="border: 1px solid rgba(98,43,22,0.1); background:#fff;">
              <div class="card-body p-4 p-md-5">
                <h2 class="h5 fw-bold mb-1" style="color:#622b16;">Ventas Realizadas</h2>
                <p class="text-muted mb-4" style="font-size:.9rem;">Historial de todas las ventas completadas en la tienda.</p>

                <div class="table-responsive">
                  <table class="table table-hover align-middle" style="font-size:.9rem;">
                    <thead>
                      <tr style="border-bottom: 2px solid rgba(98,43,22,0.15);">
                        <th class="fw-semibold text-maie">Orden</th>
                        <th class="fw-semibold text-maie">Cliente</th>
                        <th class="fw-semibold text-maie">Productos</th>
                        <th class="fw-semibold text-maie">Total</th>
                        <th class="fw-semibold text-maie">Estado</th>
                        <th class="fw-semibold text-maie">Fecha de creacion</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($ventas as $venta)
                        <tr>
                          <td class="fw-bold text-maie">#{{ $venta->id }}</td>
                          <td>{{ $venta->usuario->nombre ?? 'N/A' }}</td>
                          <td>
                            <ul class="list-unstyled mb-0">
                              @foreach($venta->detalles as $detalle)
                                <li class="mb-1" style="font-size: 0.85rem;">
                                  <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill me-1" style="font-size:0.7rem; padding: 0.2rem 0.4rem;">
                                    {{ $detalle->cantidad }}x
                                  </span>
                                  <span class="fw-semibold">{{ $detalle->producto->nombre ?? 'Producto no disponible' }}</span>
                                </li>
                              @endforeach
                            </ul>
                          </td>
                          <td class="fw-bold">$ {{ number_format($venta->total, 2, ',', '.') }}</td>
                          <td>
                            @if($venta->estado === 'confirmado')
                              <span class="badge bg-success px-2.5 py-1.5 rounded-pill">Confirmado</span>
                            @else
                              <span class="badge bg-warning px-2.5 py-1.5 rounded-pill">{{ ucfirst($venta->estado) }}</span>
                            @endif
                          </td>
                          <td>{{ $venta->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="6" class="text-center py-4 text-muted">No hay ventas realizadas aún.</td>
                        </tr>
                      @endforelse
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

{{-- Modal de Edición --}}
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content rounded-4 shadow" style="border: 1px solid rgba(98,43,22,0.15); background:#fff;">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" id="modalEditarLabel" style="color:#622b16; font-family:'Noto Serif',serif;">Editar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formEditarProducto" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body pt-3">
          <div class="row g-3">
            <div class="col-12 col-sm-6">
              <label class="form-label text-maie fw-medium" for="editar-nombre">Nombre del producto</label>
              <input type="text" id="editar-nombre" name="nombre" class="maie-input" required>
            </div>

            <div class="col-12 col-sm-6">
              <label class="form-label text-maie fw-medium" for="editar-precio">Precio ($)</label>
              <input type="number" id="editar-precio" name="precio" class="maie-input" min="0" step="0.01" required>
            </div>

            <div class="col-12">
              <label class="form-label text-maie fw-medium" for="editar-descripcion">Descripción</label>
              <textarea id="editar-descripcion" name="descripcion" class="maie-input" rows="2" style="resize: vertical;" required></textarea>
            </div>

            <div class="col-12 col-sm-6">
              <label class="form-label text-maie fw-medium" for="editar-stock">Stock</label>
              <input type="number" id="editar-stock" name="stock" class="maie-input" min="0" required>
            </div>

            <div class="col-12 col-sm-6">
              <label class="form-label text-maie fw-medium" for="editar-imagen">Imagen del producto (opcional)</label>
              <input type="file" id="editar-imagen" name="imagen" class="maie-input" accept=".jpg,.jpeg,.png,image/jpeg,image/png" style="padding: 0.45rem 1rem; cursor: pointer;">
              <div class="form-text text-muted mt-1" style="font-size: 0.78rem;">
                <i class="bi bi-info-circle-fill text-maie me-1"></i>Formatos permitidos: <strong>JPG, JPEG, PNG</strong>. Peso máximo: <strong>2 MB</strong>.
              </div>
            </div>

            <div class="col-12 d-flex gap-3 align-items-center mt-3">
              <div>
                <p class="text-maie fw-medium mb-1" style="font-size:.85rem;">Imagen actual:</p>
                <img id="editar-imagen-actual" src="#" alt="Actual" class="rounded-3" style="width:100px; height:100px; object-fit:cover; border: 1px solid rgba(98,43,22,0.1);">
              </div>
              <div id="editar-preview-container" class="d-none">
                <p class="text-maie fw-medium mb-1" style="font-size:.85rem;">Nueva vista previa:</p>
                <img id="editar-imagen-preview" src="#" alt="Preview" class="rounded-3" style="width:100px; height:100px; object-fit:cover; border: 2px solid rgba(98,43,22,0.2);">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer border-0 pt-0 gap-2">
          <button type="button" class="btn btn-outline-secondary rounded-pill px-4 py-2" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-custom rounded-pill px-4 py-2 fw-bold">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  // Preview imagen nuevo producto
  document.getElementById('nuevo-imagen')?.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById('imagen-preview').src = e.target.result;
      document.getElementById('preview-container').classList.remove('d-none');
    };
    reader.readAsDataURL(file);
  });

  // Preview imagen editar producto
  document.getElementById('editar-imagen')?.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById('editar-imagen-preview').src = e.target.result;
      document.getElementById('editar-preview-container').classList.remove('d-none');
    };
    reader.readAsDataURL(file);
  });

  // Poblar modal editar producto
  const modalEditar = document.getElementById('modalEditar');
  if (modalEditar) {
    modalEditar.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      const id = button.getAttribute('data-id');
      const nombre = button.getAttribute('data-nombre');
      const descripcion = button.getAttribute('data-descripcion');
      const precio = button.getAttribute('data-precio');
      const stock = button.getAttribute('data-stock');
      const imagen = button.getAttribute('data-imagen');

      // Configurar acción del formulario
      const form = document.getElementById('formEditarProducto');
      form.action = `/admin/productos/${id}`;

      // Rellenar campos
      document.getElementById('editar-nombre').value = nombre;
      document.getElementById('editar-descripcion').value = descripcion;
      document.getElementById('editar-precio').value = precio;
      document.getElementById('editar-stock').value = stock;
      document.getElementById('editar-imagen-actual').src = imagen;

      // Resetear vista previa
      document.getElementById('editar-imagen').value = '';
      document.getElementById('editar-preview-container').classList.add('d-none');
    });
  }
</script>

@endsection
