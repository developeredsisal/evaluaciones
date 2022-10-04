## Instalación

- Clona el repositorio en la carpeta que quieras
- Corre el comando `cp .env.example .env` para copiar archivo de ejemplo a `.env`
- Edita tu archivo `.env` con las credenciales de la base de datos y otras configuraciones si desea cambiarlas
- Corre el comando `composer install`
- Corre el comando `php artisan migrate --seed` Importante para crear las credenciales de usuario administrador
- Corre el comando `php artisan key:generate`
