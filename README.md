# Login PHP con SQLite (paradigma oriendato a objetos).

Proyecto básico para demostrar el funcionamiento de la clase SQLite3 realizando un login en PHP haciendo uso del paradigma orientado a objetos.
La base de datos tiene una tabla llamada "users" donde se almacena la información de los usuarios. El sistema de login hace uso de hashes para almacenar las contraseñas cifradas y que no queden visibles. Pare manejar una sola conexión a la BD, se ha implementado el patrón singleton en la clase padre de todos los DAOs.

## Estructura general del proyecto:

- Directorio "public": Contiene el frontend de la web. En este caso, un archivo index.php con un formulario y la lógica del procesamiento de la entrada de datos.

- Directorio "resources": Contiene la base de datos en un directorio llamado "database".

- Directorio "src": Contiene los ficheros fuente con la lógica de la app (backend).

## Generación de una password:

    php .\src\utils\generate_hash.php

El hash devuelto debemos introducirlo manualmente en el fichero de base de datos.

## Ejecución del proyecto: 

- Desde el directorio "public", ejecutamos lo siguiente: php -S localhost:8000
- También podemos ejecutar el proyecto desde algún entorno de desarrollo, tipo xampp, docker, etc...

## Datos por defecto: 

Username: test
Password: y10b3z$AytrOwz
