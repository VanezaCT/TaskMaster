
#  Guía para Levantar un Proyecto en Laravel

## Requisitos Previos

Antes de empezar, asegúrete de tener instalados los siguientes requisitos:

- **PHP 8.3 o superior** ([Descargar PHP](https://www.php.net/downloads))
- **Composer** ([Descargar Composer](https://getcomposer.org/download/))
- **Base de datos (MySQL, PostgreSQL, SQLite o MariaDB)**
- **Servidor local (Opcional)**: Puedes usar **XAMPP**, **Laragon**, **Docker**, etc.

---

## 1. Clonar el Proyecto

Si el proyecto ya está en un repositorio de Git, clónalo con:

```bash
git clone https://github.com/VanezaCT/TaskMaster.git
```

Después, entra en la carpeta del proyecto:

```bash
cd TaskMaster
```

---

## 2. Instalar Dependencias

Ejecuta el siguiente comando para instalar las dependencias del proyecto:

```bash
composer install
```

---

## 3. Configurar Variables de Entorno

Laravel usa un archivo `.env` para manejar la configuración. Si no existe, crea una copia del archivo de ejemplo:

```bash
cp .env.example .env
```

Después, abre el archivo `.env` y configura la conexión a la base de datos:

```ini
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=TaskMaster
DB_USERNAME=postgres
DB_PASSWORD=VanezaDB
```

---

## 4. Generar la Key de la Aplicación

Ejecuta el siguiente comando para generar una clave de aplicación:

```bash
php artisan key:generate
```

---

## 5. Migrar la Base de Datos

Si el proyecto usa bases de datos, ejecuta las migraciones:

```bash
php artisan migrate
```

Si hay datos de prueba, puedes ejecutar los seeders con:

```bash
php artisan db:seed
```

---

## 6. Levantar el Servidor Local

Inicia el servidor de desarrollo de Laravel con:

```bash
php artisan serve
```

Por defecto, la aplicación estará disponible en:

```
http://127.0.0.1:8000
```

Si necesitas cambiar el puerto, usa:

```bash
php artisan serve --port=8080
```

---

## 7.  Documentacion 

la documentacion se encuentra en la carpeta docs y es un archivo de postman

---

##  ¡Listo! 
