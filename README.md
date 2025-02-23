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
- "php artisan migrate" y luego "php artisan migrate --seed"
- "php artisan storage:link" ó accede a la url "storage-link" la cual te generará el mismo resultado del comando

## Funcionalidades

El sistema tiene incorporado las siguientes funcionalidades:
- Autenticación mediante identificación y clave.
- Registro, visualización, actualización, deshabilitación/habilitación y eliminación de pacientes.
- Carga de imagenes de paciente.
- Al ejecutar las migraciones se establecerá el usuario administrador "1000000000" y su contraseña por defecto (veala en el documento de requerimientos).

## Manual de usuario

- Para acceder al sistema use el usuario por defecto "1000000000" y la contraseña proporcionada en los requerimientos.
- Para registrar un paciente nuevo pulse el botón "Agregar Nuevo", lo dirigirá al formulario de registro de paciente.
- Para actualizar toda la información de un paciente pulse el botón "Editar" que se encuentra en el listado de pacientes.
- Para eliminar un paciente pulse el botón "Eliminar" que se encuentra en el listado de pacientes, se le pedirá una confirmación antes de continuar con la operación.
- Para actualizar unicamente el estado del paciente puede pulsar el botón "Habilitar / Deshabilitar" que se encuentra en el listado de pacientes.
- En el formulario de registro y actualización de pacientes, al seleccionar el departamento sus municipios serán cargados automaticamente en la lista desplegable "municipios".

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
