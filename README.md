# Maie - Dulces Artesanales

## Sobre el proyecto
El proyecto consiste en un e-commerce completo para un emprendimiento familiar de dulces artesanales. El objetivo principal de la pagina es vender dulces artesanales a los usuarios clientes, a traves de un catalogo que podra ser gestionado por un usuario administrador.

## Proceso de desarrollo
El proyecto se desarrolló en 2 etapas principales. La primera etapa consistió en el desarrollo front-end puro: primero se realizaron las estructuras de las páginas utilizando HTML5, para luego ir dándole los detalles necesarios usando componentes de Bootstrap y  un poco de CSS nativo.

La segunda etapa fue principalmente de desarrollo back-end, aunque se trabajó con HTML y CSS para las vistas de los paneles de control. La mayoría del desarrollo consistió en el diseño de bases de datos, migraciones y seeders, la implementación del sistema de autenticación con roles (administrador y cliente), la gestión de productos y carrito de compras, y el desarrollo de los paneles de control para cada tipo de usuario. Para todo esto se utilizó Laravel, un framework de PHP.

El proceso de desarrollo transcurrió casi sin sobresaltos. El único problema significativo ocurrió durante el desarrollo del panel de administrador, debido a la metodología de trabajo por branches: una migración necesaria no había sido subida al repositorio de GitHub, y una librería utilizada no había sido instalada en una de las ramas (faltaba correr composer install). Esto generó errores al mergear que tomaron tiempo en diagnosticar, pero se resolvieron sincronizando las ramas correctamente.

## Pruebas de implementación
Se realizaron las siguientes pruebas:

Seguridad de acceso y autenticación
Rutas protegidas (/admin, /cliente) redirigen correctamente al login cuando no hay sesión activa.
El formulario de registro rechaza requests sin token CSRF (HTTP 419).
No es posible registrarse como administrador inyectando rol_id=1 en el body del formulario — el rol está hardcodeado en el controller.
Un cliente autenticado no puede acceder a rutas de admin ni modificar roles de usuario.
El endpoint de descarga de comprobantes verifica que la venta pertenezca al usuario que la solicita (no hay IDOR).

Lógica de venta y stock
Intentar agregar al carrito un producto con ID inexistente devuelve 404.
Intentar agregar directamente (sin pasar por la UI) un producto con stock 0 es rechazado por el controller con un mensaje de error — el botón deshabilitado en el catálogo no es la única protección.
Al agregar un producto con stock 1, la segunda vez que se intenta agregar el mismo ítem el controller lo rechaza por stock insuficiente.
Al confirmar una compra, el stock se descuenta correctamente en la base de datos dentro de una transacción, y hay una segunda validación de stock en ese momento para evitar condiciones de carrera.

Las pruebas de implementación básicas (ingreso al panel de administrador a través de URL sin estar logueado como administrador, comprar un producto con stock agotado) fueron realizadas en el proceso de desarrollo.

Para las pruebas a profundidad del middleware y de la lógica de negocio, se utilizó un agente de inteligencia artificial para realizarlas.

## Ejecucion del proyecto
Para clonar y ejecutar el proyecto en Laravel Herd, seguí estos pasos:

**Paso 1 — Clonar el repositorio**
```bash
git clone https://github.com/KaiserHMon/ProyectoGrupo17
```

**Paso 2 — Instalar dependencias**
```bash
composer install
```

**Paso 3 — Crear el archivo de entorno**
```bash
cp .env.copy .env
```

**Paso 3.1 — Crear el archivo de entorno - SI EL COMANDO ANTERIOR NO FUNCIONA**
```bash
copy .env.copy .env
```

**Paso 4 — Copiar la base de datos SQLite al proyecto**

**Paso 5 — Generar la clave de la aplicación**
```bash
php artisan key:generate
```

**Paso 6 - Verificar que en .env la conexion a la base de datos es a SQLITE**
```bash
DB_CONNECTION=sqlite
```

**Paso 7 - Ejecutar migraciones**
```bash
php artisan migrate
```

**PARA PROBAR LOS 2 TIPOS DE USUARIOS**
```bash
UsuarioCliente cliente@prueba.com - cliente12345
UsuarioAdmin   admin@prueba.com   - admin12345 
```