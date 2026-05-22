# TODO: Correcciones Manuales - Módulo de Productos y Ventas

Este documento contiene las tareas pendientes para ajustar la implementación a las preferencias de diseño y coordinación con el compañero (Benja).

- [ ] **1. Ajuste de Iconos y Estilos (Head & Navbar)**
    - [ ] En `resources/views/templates/head.blade.php`: Eliminar el enlace CDN a Bootstrap Icons (el `<link>` que agregué al final).
    - [ ] En `resources/views/templates/navbar.blade.php`: Reemplazar el ícono del carrito por un `<svg>` local o el sistema de iconos que prefieras. Asegúrate de que el `<a>` mantenga el `href="{{ route('carrito.show') }}"`.

- [ ] **2. Adaptación de Modelos (Integración con Benja)**
    - [ ] En `app/Models/VentaCabecera.php`: Revisar el método `usuario()`. Si Benja renombra el modelo `User` o usa una estructura distinta para la autenticación, actualizar la referencia `User::class` por la que él defina.
    - [ ] En `app/Http/Controllers/CarritoController.php` y `VentaController.php`: Reemplazar cualquier lógica que asuma el modelo `User` por la lógica de roles/usuarios que implemente Benja.
    - [ ] Verificar que la tabla en la base de datos siga llamándose `usuarios` como se acordó.

- [ ] **3. Flujo de Autenticación (Login Obligatorio)**
    - [ ] En `app/Http/Controllers/CarritoController.php`: En el método `add`, agregar una validación inicial:
      ```php
      if (!auth()->check()) {
          return redirect()->route('login')->with('error', 'Debes iniciar sesión para añadir productos al carrito.');
      }
      ```
    - [ ] Alternativamente, en `routes/web.php`: Envolver las rutas de `/carrito` en un grupo con el middleware `auth`:
      ```php
      Route::middleware(['auth'])->group(function () {
          Route::get('/carrito', [CarritoController::class, 'show'])->name('carrito.show');
          Route::post('/carrito/agregar/{id}', [CarritoController::class, 'add'])->name('carrito.add');
          Route::post('/carrito/confirmar', [VentaController::class, 'confirmar'])->name('venta.confirmar');
      });
      ```
    - [ ] Asegurarse de que la ruta de login de Benja tenga el nombre `->name('login')` para que Laravel sepa a dónde redirigir automáticamente.

- [ ] **4. Limpieza de Controladores**
    - [ ] Eliminar `app/Http/Controllers/VentaCabeceraController.php` y `app/Http/Controllers/VentaDetalleController.php` si decides no usarlos.
