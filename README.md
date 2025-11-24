
# API de Productos en Laravel

Proyecto desarrollado para el bootcamp **Full Stack Jr.**
Implementa una API REST para la gestión de productos, usuarios y valoraciones con autenticación basada en tokens usando Laravel Sanctum.

---

## 🚀 Tecnologías Utilizadas
- Laravel 11
- PHP 8
- MySQL (XAMPP / phpMyAdmin)
- Laravel Sanctum
- Composer
- Postman / Insomnia

---

## ⚙ Instalación

Clonar el proyecto e instalar dependencias:

```bash
git clone https://github.com/CristianHF29/api-productos-laravel.git
cd api-productos-laravel
composer install
cp .env.example .env
php artisan key:generate
```

---

## 🗄 Configuración de Base de Datos

1. Crear una base de datos llamada **api_productos** en phpMyAdmin.
2. Importar el archivo incluido en el repositorio:

```
api_productos.sql
```

3. Configurar el archivo `.env` con los datos de conexión:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=api_productos
DB_USERNAME=root
DB_PASSWORD=
```

4. Ejecutar migraciones (si fuera necesario):

```bash
php artisan migrate
```

5. Iniciar el servidor:

```bash
php artisan serve
```

---

## 🔐 Autenticación con Sanctum

La API utiliza tokens personales (**Bearer Token**).

### Endpoints de autenticación:

| Método | Endpoint        | Descripción |
|--------|----------------|-------------|
| POST   | `/api/register` | Registrar usuario |
| POST   | `/api/login`    | Iniciar sesión y obtener token |
| POST   | `/api/logout`   | Revocar token actual |
| POST   | `/api/refresh`  | Generar token nuevo |

### Uso del token:

```
Authorization: Bearer TU_TOKEN
```

---

## 📦 Endpoints de Productos (CRUD)

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET    | `/api/products` | Listar productos |
| POST   | `/api/products` | Crear producto |
| GET    | `/api/products/{id}` | Mostrar un producto |
| PUT    | `/api/products/{id}` | Actualizar producto |
| DELETE | `/api/products/{id}` | Eliminar producto |

---

## ⭐ Valoraciones y Estadísticas

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| POST | `/api/products/{id}/reviews` | Crear valoración |
| GET  | `/api/products/{id}/reviews` | Listar valoraciones |
| GET  | `/api/products/{id}/average-rating` | Promedio del producto |
| GET  | `/api/products-best-rated` | Producto con mejor valoración |

---

## ✔ Estado del Proyecto

Proyecto completado según los requisitos del bootcamp:
- CRUD completo
- Autenticación con tokens
- Valoraciones de usuarios
- Estadísticas por producto
- Base de datos incluida

---

## ✨ Autor

**Cristian Arturo Hernández Flores**
Bootcamp Full Stack Jr. — Academia Kodigo
