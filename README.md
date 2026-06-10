# Maie - Dulces Artesanales

## Sobre el proyecto

## Proceso de desarrollo

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

**Paso 4 — Generar la clave de la aplicación**
```bash
php artisan key:generate
```

**Paso 5 — Verificar en el archivo .env que SESSION_DRIVER sea igual a database (LINEA 30)**
```bash
 SESSION_DRIVER=database
```

**Paso 6 - Verificar que en .env la conexion a la base de datos es a SQLITE**
```bash
DB_CONNECTION=sqlite
```

**Paso 7 - Ejecutar migraciones**
```bash
php artisan migrate
```
