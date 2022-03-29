# script-ojs
Scripts para la gestion, migración y actualizacion de instancias de OJS

Uso

1. Copiar en el directorio dumpdir una copia del dump de la base de datos del OJS a migrar. El archivo debe llamarse dump.sql
2. También puede copiarse ese archivo en el directorio init-db , para que se regenere la primera vez
3. Revisar las configuraciones del archivo .env
4. Descargar la versión de OJS a migrar , y descomprimirla en el directorio public_ojs
5. Copiar el archivo de configuración del ojs original (config.inc.php) en public_ojs 
6. Editar el archivo public_ojs/config.inc.php, seteando:
    URL: http://localhost
    (si hay URL personalizas por revista, también setearlas en localhost)
    Servidor de bases de datos: MySQL
    Usuario de MySQL: root
    Password: CLAVE de root del archivo .env
    Nombre de BD: BD del archivo .env
7. Copiar los archivos privados (FILES DIR) de OJS en el directorio private_ojs

Con esto, ya está listo el esqueleto para iniciar las migraciones.
Para levantar el contexto, ejecutar "make up". Esto levanta el OJS en http://localhost, con un MySQL en el host mysql, y PhpMyAdmin en http://localhost:8080

Para correr una migración, ejecutar "make migrate" . En caso que se genere un error por la versión de PHP, editar el archivo docker-compose.yml, comentando la versión de PHP actual y descomentando la que se desea utilizar

En caso que la migración falle, será necesario volver a generar la base de datos. Esto se puede hacer con el comando "make regenerate" . Esto eliminará la base de datos actual
y volverá a generarla a partir del backup (archivo dump.sql en el directorio dumpdir). 
Una vez que se restauró, se deberán realizar las correcciones que provocaron el fallo en el intento anterior. Luego de realizadas estas correcciones, se puede volver a intentar la migración

El archivo Makefile incluye algunos comandos útiles adicionales, como:
- make backup : realiza un backup completo de la base de datos, y lo almacena en el directorio dumpdir
- make bash-mysql : inicia una terminal bash dentro del container mysql
- make bash-web : inicia una terminal bash dentro del container web (donde corre php)

