# Contacts-app - Aplicación web de contactos

* Desarrollado por [Aguilar Luciano Ivan]
* [2024]

## Descripción

El sistema proporciona una plataforma digital para facilitar la creación y visualización de perfiles de contacto. A través de esta plataforma, los usuarios pueden editar su perfil con imagen, teléfono, url y categorías disponibles por la aplicación. Con ella puede también visualizar los perfiles de otros usuarios.

## Características Principales

- Gestión de usuarios: registro de usuarios, roles,  edición y eliminación.
- Visualizar perfiles: Permite a los usuarios ver su propio perfil y el de los demás usuarios de la aplicación.
- Gestión de categorías y subcategorías: Permite al administrador poder crear, editar y eliminar categorías y subcategorías para que los usuarios puedan elegir.


## Requisitos del Sistema

-   Framework principal: Laravel 11
-   PHP 8.3.13
-   Mysql 8.3

## Requisitos del Servidor

    PHP >= 8.2
    Ctype PHP Extension
    cURL PHP Extension
    DOM PHP Extension
    Fileinfo PHP Extension
    Filter PHP Extension
    Hash PHP Extension
    Mbstring PHP Extension
    OpenSSL PHP Extension
    PCRE PHP Extension
    PDO PHP Extension
    Session PHP Extension
    Tokenizer PHP Extension
    XML PHP Extension



## Instalación

1. Clonar el repositorio:

    ```
    git clone https://github.com/lucianoAguilarWD/contacts-app.git
    ```

### Dentro de la carpeta del proyecto abrir terminal y ejecutar los siguientes comandos

2. Instalar dependencias:

    ```
    composer install --optimize-autoloader --no-dev
    ```
    
    ```
    npm install
    ```
    
    ```
    npm run build
    ```

4. configuración:

    ```
    cp .env.example .env
    ```
    
    ```
    php artisan key:generate
    ```
    
    ```
    php artisan storage:link
    ```

6. Permisos
    ```
    chmod -R 775 storage bootstrap/cache
    chown -R www-data:www-data .
    ```
7. Ejecutar las migraciones:

    ```
    php artisan migrate --force
    ```

8. Ejecutar el seeder de usuario:

    ```
    php artisan db:seed
    ```

9. Compilar los assets, idealmente tener una terminal para:

    ```
    npm run dev
    ```

10. Iniciar el servidor y abrir otra terminal para:

    ```
    php artisan serve
    ```    

## Uso

Después de la instalación, puedes acceder al sistema a través del link que da artisan serve.

  * Puede probar los distintos roles usando las siguientes cuentas:
  
    -   admin@admin.com || pw: administrador123 || rol: administrador
    -   usuario@usuario.com || pw: usuario123 || rol: usuario

## Licencia

Este proyecto está licenciado bajo la Licencia MIT - ver el archivo [LICENSE.md](LICENSE.md) para más detalles.
