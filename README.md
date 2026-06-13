# Maie - Dulces Artesanales

## Sobre el proyecto
El proyecto consiste en un e-commerce completo para un emprendimiento familiar de dulces artesanales. El objetivo principal de la pagina es vender dulces artesanales a los usuarios clientes, a traves de un catalogo que podra ser gestionado por un usuario administrador.

## Proceso de desarrollo
El proyecto se desarrolló en 2 etapas principales. La primera etapa consistió en el desarrollo front-end puro: primero se realizaron las estructuras de las páginas utilizando HTML5, para luego ir dándole los detalles necesarios usando componentes de Bootstrap y  un poco de CSS nativo.

La segunda etapa fue principalmente de desarrollo back-end, aunque se trabajó con HTML y CSS para las vistas de los paneles de control. La mayoría del desarrollo consistió en el diseño de bases de datos, migraciones y seeders, la implementación del sistema de autenticación con roles (administrador y cliente), la gestión de productos y carrito de compras, y el desarrollo de los paneles de control para cada tipo de usuario. Para todo esto se utilizó Laravel, un framework de PHP.

El proceso de desarrollo transcurrió casi sin sobresaltos. El único problema significativo ocurrió durante el desarrollo del panel de administrador, debido a la metodología de trabajo por branches: una migración necesaria no había sido subida al repositorio de GitHub, y una librería utilizada no había sido instalada en una de las ramas (faltaba correr composer install). Esto generó errores al mergear que tomaron tiempo en diagnosticar, pero se resolvieron sincronizando las ramas correctamente.

## Pruebas de implementación

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
cp .env.example .env
```

**Paso 3.1 — Crear el archivo de entorno - SI EL COMANDO ANTERIOR NO FUNCIONA**
```bash
copy .env.example .env
```

**Paso 4 — Copiar la base de datos SQLite al proyecto**

**Paso 5 — Generar la clave de la aplicación**
```bash
php artisan key:generate
```

**Paso 6 — Verificar en el archivo .env que SESSION_DRIVER sea igual a database (LINEA 30)**
```bash
 SESSION_DRIVER=database
```

**Paso 7 - Verificar que en .env la conexion a la base de datos es a SQLITE**
```bash
DB_CONNECTION=sqlite
```

**Paso 8 - Ejecutar migraciones**
```bash
php artisan migrate
```

**PARA PROBAR LOS 2 TIPOS DE USUARIOS**
```bash
UsuarioCliente cliente@prueba.com - cliente12345
UsuarioAdmin   admin@prueba.com   - admin12345 
```