# 3Dtienda

3Dtienda es una aplicación Laravel para una comunidad de diseño y fabricación aditiva. Ofrece pantallas de **Login**, **Registro**, un **Dashboard** de creador y **Editar perfil**, con gestión de datos de cuenta y cambio de contraseña.

## Requisitos

- PHP 8.2 o posterior, con la extensión `pdo_sqlite` habilitada.
- Composer.

La base de datos SQLite y los recursos frontend compilados están incluidos en el repositorio; para ejecutar la aplicación no hace falta instalar Node.js ni compilar los recursos.

## Instalación

Desde la carpeta del proyecto:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

En Windows PowerShell, sustituya el segundo comando por:

```powershell
Copy-Item .env.example .env
```

Abra la URL que indique Artisan, normalmente `http://127.0.0.1:8000`.

## Usuario demo

- **Correo:** `demo@3dtienda.test`
- **Usuario:** `demo`
- **Contraseña:** `Demo3Dtienda#2026`
- **Rol:** diseñador

El usuario demo se gestiona con `Database\Seeders\DemoUserSeeder`, invocado por `DatabaseSeeder`.

## Rutas disponibles

| Método | Ruta | Nombre | Acceso |
| --- | --- | --- | --- |
| GET | `/` | — | Público |
| GET | `/login` | `login` | Invitados |
| POST | `/login` | `login.store` | Invitados |
| GET | `/register` | `register` | Invitados |
| POST | `/register` | `register.store` | Invitados |
| GET | `/dashboard` | `dashboard` | Autenticado |
| GET | `/profile` | `profile.edit` | Autenticado |
| PATCH | `/profile` | `profile.update` | Autenticado |
| PUT | `/profile/password` | `profile.password` | Autenticado |
| POST | `/logout` | `logout` | Autenticado |
