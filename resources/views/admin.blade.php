@extends('layout')

@section('contenido')

<section class="py-5" style="background-color: #FCF9F4; min-height: 80vh;">
  <div class="container">

    <div class="mb-5 text-center">
      <h1 class="display-6 fw-bold">Panel de <span class="fst-italic text-maie">Administración</span></h1>
      <p class="text-muted">Gestioná el catálogo y el stock de productos.</p>
    </div>

    <div class="row g-4">

      {{-- Sidebar --}}
      <div class="col-12 col-md-3">
        <div class="card shadow-sm rounded-4 sticky-md-top" style="border: 1px solid rgba(98,43,22,0.1); background:#fff; top: 20px;">
          <div class="card-body p-3">
            <h6 class="fw-bold mb-3" style="color:#622b16; font-family:'Noto Serif',serif; font-size:0.85rem; text-transform:uppercase; letter-spacing:.05em;">Acciones</h6>
            <div class="nav flex-column nav-pills maie-auth-nav gap-1" id="adminTabs" role="tablist">
              <button class="nav-link active text-start" data-bs-toggle="pill" data-bs-target="#panel-stock" type="button" role="tab">
                Agregar Stock
              </button>
              <button class="nav-link text-start" data-bs-toggle="pill" data-bs-target="#panel-nuevo" type="button" role="tab">
                Nuevo Producto
              </button>
              <button class="nav-link text-start" data-bs-toggle="pill" data-bs-target="#panel-eliminar" type="button" role="tab">
                Eliminar Producto
              </button>
            </div>
          </div>
        </div>
      </div>

      {{-- Contenido --}}
      <div class="col-12 col-md-9">
        <div class="tab-content">

          {{-- Agregar Stock --}}
          <div class="tab-pane fade show active" id="panel-stock" role="tabpanel">
            <div class="card shadow-sm rounded-4" style="border: 1px solid rgba(98,43,22,0.1); background:#fff;">
              <div class="card-body p-4 p-md-5">
                <h2 class="h5 fw-bold mb-1" style="color:#622b16;">Agregar Stock</h2>
                <p class="text-muted mb-4" style="font-size:.9rem;">Seleccioná un producto y la cantidad a agregar al inventario.</p>

                <form>
                  <div class="mb-4">
                    <label class="form-label text-maie fw-medium" for="stock-producto">Producto</label>
                    <select id="stock-producto" name="producto_id" class="maie-input">
                      <option value="" disabled selected>Seleccioná un producto...</option>
                      <option>Maie Negro</option>
                      <option>Maie Blanco</option>
                      <option>Maie Frutos Rojos</option>
                      <option>Cono Tentacion</option>
                      <option>Cookie Pistachio</option>
                      <option>Classic Cookie</option>
                      <option>Macaron Au Chocolat</option>
                      <option>Macaron Aux Framboises</option>
                    </select>
                  </div>

                  <div class="mb-4">
                    <label class="form-label text-maie fw-medium" for="stock-cantidad">Cantidad a agregar</label>
                    <input type="number" id="stock-cantidad" name="cantidad" class="maie-input" min="1" placeholder="Ej: 50">
                  </div>

                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn-custom border-0 rounded px-4 py-2 fw-medium">
                      Confirmar Stock
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          {{-- Nuevo Producto --}}
          <div class="tab-pane fade" id="panel-nuevo" role="tabpanel">
            <div class="card shadow-sm rounded-4" style="border: 1px solid rgba(98,43,22,0.1); background:#fff;">
              <div class="card-body p-4 p-md-5">
                <h2 class="h5 fw-bold mb-1" style="color:#622b16;">Agregar Nuevo Producto</h2>
                <p class="text-muted mb-4" style="font-size:.9rem;">Completá los datos para publicar un nuevo producto en el catálogo.</p>

                <form>
                  <div class="row g-3">
                    <div class="col-12 col-sm-6">
                      <label class="form-label text-maie fw-medium" for="nuevo-nombre">Nombre del producto</label>
                      <input type="text" id="nuevo-nombre" name="nombre" class="maie-input" placeholder="Ej: Alfajor de Limón">
                    </div>

                    <div class="col-12 col-sm-6">
                      <label class="form-label text-maie fw-medium" for="nuevo-precio">Precio ($)</label>
                      <input type="number" id="nuevo-precio" name="precio" class="maie-input" min="0" step="0.01" placeholder="Ej: 1500.00">
                    </div>

                    <div class="col-12">
                      <label class="form-label text-maie fw-medium" for="nuevo-descripcion">Descripción</label>
                      <textarea id="nuevo-descripcion" name="descripcion" class="maie-input" rows="3" placeholder="Describí el producto brevemente..." style="resize: vertical;"></textarea>
                    </div>

                    <div class="col-12 col-sm-6">
                      <label class="form-label text-maie fw-medium" for="nuevo-stock">Stock inicial</label>
                      <input type="number" id="nuevo-stock" name="stock" class="maie-input" min="0" placeholder="Ej: 100">
                    </div>

                    <div class="col-12 col-sm-6">
                      <label class="form-label text-maie fw-medium" for="nuevo-imagen">Imagen del producto</label>
                      <input type="file" id="nuevo-imagen" name="imagen" class="maie-input" accept="image/*" style="padding: 0.45rem 1rem; cursor: pointer;">
                    </div>

                    <div class="col-12">
                      <div id="preview-container" class="d-none mt-2">
                        <p class="text-maie fw-medium mb-1" style="font-size:.85rem;">Vista previa:</p>
                        <img id="imagen-preview" src="#" alt="Preview" class="rounded-3" style="width:140px; height:140px; object-fit:cover; border: 2px solid rgba(98,43,22,0.2);">
                      </div>
                    </div>
                  </div>

                  <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn-custom border-0 rounded px-4 py-2 fw-medium">
                      Publicar Producto
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          {{-- Eliminar Producto --}}
          <div class="tab-pane fade" id="panel-eliminar" role="tabpanel">
            <div class="card shadow-sm rounded-4" style="border: 1px solid rgba(98,43,22,0.1); background:#fff;">
              <div class="card-body p-4 p-md-5">
                <h2 class="h5 fw-bold mb-1" style="color:#622b16;">Eliminar Producto</h2>
                <p class="text-muted mb-4" style="font-size:.9rem;">Seleccioná el producto que querés eliminar del catálogo. Esta acción no se puede deshacer.</p>

                <div class="d-flex flex-column gap-3">
                  <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="border: 1px solid rgba(98,43,22,0.1); background:#FCF9F4;">
                    <div class="d-flex align-items-center gap-3">
                      <img src="/images/productos/maie-93.jpg" alt="Maie Negro" class="rounded-3" style="width:56px; height:56px; object-fit:cover;">
                      <div>
                        <p class="mb-0 fw-bold" style="color:#622b16; font-size:.95rem;">Maie Negro</p>
                        <p class="mb-0 text-muted" style="font-size:.82rem;">Stock actual: 34 unidades</p>
                      </div>
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm rounded-3 fw-medium" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-nombre="Maie Negro">
                      Eliminar
                    </button>
                  </div>

                  <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="border: 1px solid rgba(98,43,22,0.1); background:#FCF9F4;">
                    <div class="d-flex align-items-center gap-3">
                      <img src="/images/productos/maie-95.jpg" alt="Maie Blanco" class="rounded-3" style="width:56px; height:56px; object-fit:cover;">
                      <div>
                        <p class="mb-0 fw-bold" style="color:#622b16; font-size:.95rem;">Maie Blanco</p>
                        <p class="mb-0 text-muted" style="font-size:.82rem;">Stock actual: 21 unidades</p>
                      </div>
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm rounded-3 fw-medium" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-nombre="Maie Blanco">
                      Eliminar
                    </button>
                  </div>

                  <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="border: 1px solid rgba(98,43,22,0.1); background:#FCF9F4;">
                    <div class="d-flex align-items-center gap-3">
                      <img src="/images/productos/maie-rojo.jpeg" alt="Maie Frutos Rojos" class="rounded-3" style="width:56px; height:56px; object-fit:cover;">
                      <div>
                        <p class="mb-0 fw-bold" style="color:#622b16; font-size:.95rem;">Maie Frutos Rojos</p>
                        <p class="mb-0 text-muted" style="font-size:.82rem;">Stock actual: 15 unidades</p>
                      </div>
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm rounded-3 fw-medium" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-nombre="Maie Frutos Rojos">
                      Eliminar
                    </button>
                  </div>

                  <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="border: 1px solid rgba(98,43,22,0.1); background:#FCF9F4;">
                    <div class="d-flex align-items-center gap-3">
                      <img src="/images/productos/conitos-manfrey2.jpg" alt="Cono Tentacion" class="rounded-3" style="width:56px; height:56px; object-fit:cover;">
                      <div>
                        <p class="mb-0 fw-bold" style="color:#622b16; font-size:.95rem;">Cono Tentacion</p>
                        <p class="mb-0 text-muted" style="font-size:.82rem;">Stock actual: 50 unidades</p>
                      </div>
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm rounded-3 fw-medium" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-nombre="Cono Tentacion">
                      Eliminar
                    </button>
                  </div>

                  <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="border: 1px solid rgba(98,43,22,0.1); background:#FCF9F4;">
                    <div class="d-flex align-items-center gap-3">
                      <img src="/images/productos/crumbl-pistacchio.webp" alt="Cookie Pistachio" class="rounded-3" style="width:56px; height:56px; object-fit:cover;">
                      <div>
                        <p class="mb-0 fw-bold" style="color:#622b16; font-size:.95rem;">Cookie Pistachio</p>
                        <p class="mb-0 text-muted" style="font-size:.82rem;">Stock actual: 8 unidades</p>
                      </div>
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm rounded-3 fw-medium" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-nombre="Cookie Pistachio">
                      Eliminar
                    </button>
                  </div>

                  <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="border: 1px solid rgba(98,43,22,0.1); background:#FCF9F4;">
                    <div class="d-flex align-items-center gap-3">
                      <img src="/images/productos/crumbl-classic.jpg" alt="Classic Cookie" class="rounded-3" style="width:56px; height:56px; object-fit:cover;">
                      <div>
                        <p class="mb-0 fw-bold" style="color:#622b16; font-size:.95rem;">Classic Cookie</p>
                        <p class="mb-0 text-muted" style="font-size:.82rem;">Stock actual: 12 unidades</p>
                      </div>
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm rounded-3 fw-medium" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-nombre="Classic Cookie">
                      Eliminar
                    </button>
                  </div>

                  <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="border: 1px solid rgba(98,43,22,0.1); background:#FCF9F4;">
                    <div class="d-flex align-items-center gap-3">
                      <img src="/images/productos/macarons-chocolate.jpg" alt="Macaron Au Chocolat" class="rounded-3" style="width:56px; height:56px; object-fit:cover;">
                      <div>
                        <p class="mb-0 fw-bold" style="color:#622b16; font-size:.95rem;">Macaron Au Chocolat</p>
                        <p class="mb-0 text-muted" style="font-size:.82rem;">Stock actual: 30 unidades</p>
                      </div>
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm rounded-3 fw-medium" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-nombre="Macaron Au Chocolat">
                      Eliminar
                    </button>
                  </div>

                  <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="border: 1px solid rgba(98,43,22,0.1); background:#FCF9F4;">
                    <div class="d-flex align-items-center gap-3">
                      <img src="/images/productos/macaron-framboise.jpg" alt="Macaron Aux Framboises" class="rounded-3" style="width:56px; height:56px; object-fit:cover;">
                      <div>
                        <p class="mb-0 fw-bold" style="color:#622b16; font-size:.95rem;">Macaron Aux Framboises</p>
                        <p class="mb-0 text-muted" style="font-size:.82rem;">Stock actual: 18 unidades</p>
                      </div>
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm rounded-3 fw-medium" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-nombre="Macaron Aux Framboises">
                      Eliminar
                    </button>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

{{-- Modal de confirmación --}}
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4" style="border: 1px solid rgba(98,43,22,0.15);">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" id="modalEliminarLabel" style="color:#622b16; font-family:'Noto Serif',serif;">Confirmar eliminación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body pt-2">
        <p class="text-muted mb-0">¿Estás seguro que querés eliminar <strong id="modal-nombre-producto" class="text-maie"></strong>? Esta acción no se puede deshacer.</p>
      </div>
      <div class="modal-footer border-0 pt-0 gap-2">
        <button type="button" class="btn btn-outline-secondary rounded-3 px-4" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger rounded-3 px-4 fw-medium" data-bs-dismiss="modal">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('nuevo-imagen').addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById('imagen-preview').src = e.target.result;
      document.getElementById('preview-container').classList.remove('d-none');
    };
    reader.readAsDataURL(file);
  });

  document.getElementById('modalEliminar').addEventListener('show.bs.modal', function (event) {
    document.getElementById('modal-nombre-producto').textContent = event.relatedTarget.getAttribute('data-nombre');
  });
</script>

@endsection
