## Prueba-tecnica-sinergia

Repositorio para prueba técnica "PRUEBA TECNICA CARGO DESARROLLADOR JUNIOR".

## Tecnologia usada

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Requisitos pre-instalación

- Es necesario que tengas instalado PHP 8.1 o superior para que funcione con normalidad.
- Este proyecto fue desarrollado usando la pila de desarrollo XAMPP para php 8.1.25.

Puedes descargar la version de XAMPP aquí [xampp-windows-x64-8.1.25-0-VS16-installer.exe](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.1.25/)

## Instalación

Para la instalación del proyecto asegurate de seguir los siguiente pasos:

- Crea una copia del archivo ".env.example" y renombrala como ".env".
- Abre una terminal o cmd en la carpeta raiz del proyecto y ejecuta el siguiente comando "php artisan key:generate", lo que creará la llave adecuada para el proyecto en el archivo ".env".
- Configura en el archivo ".env" las llaves "DB_DATABASE, DB_USERNAME y DB_PASSWORD" según como tengas configurado tu entorno de desarrollo.
- Extrae en la carpeta raiz del proyecto el archivo "vendor.zip" en caso de que no cuentes con composer en tu computador.
- Extrae en la carpeta raiz del proyecto el archivo "storage.zip".
- Abre una terminal o cmd en la carpeta raiz del proyecto y ejecuta los siguiente comandos:
- "php artisan migrate" y luego "php artisan migrate:fresh --seed"

## Funcionalidades

El sistema tiene incorporado las siguientes funcionalidades:
- Autenticación mediante identificación y clave.
- Registro, visualización, actualización, desactivación/activación y eliminación de pacientes.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
