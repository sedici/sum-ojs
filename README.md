# SUM-OJS | Scripts for upgrades and migrations of OJS 

SUM-OJS propone unos scripts que, apoyados sobre un stack basado en contenedores docker, permiten agilizar las tareas de gestion, migración y actualizacion de instancias de OJS


Uso

Configuración inicial global:

El directorio private_ojs debe contener todos los archivos privados de OJS.
Además, el archivo .env debe contener las variables de entorno con las que se realizará la migración:

Nombre del proyecto, utilizado para crear containers docker:
PROJECT_NAME=ojsunlp

Nombre de la base de datos sobre la que se realizarán las migraciones:
DATABASE_NAME=ojsunlp

Contraseña del usuario root, necesaria para regenerar la base de datos cuando se solicita
ROOT_PASSWORD=root

Nombre del archivo SQL que contiene la base de datos a importar CADA VEZ que se regenere:
DUMP_FILE=load-data.sql

Archivo SQL que contiene otros comandos SQL a ejecutar luego de regenerar la base de datos
POST_DUMP_FILE=post-load-data-sql

Directorio dentro de los containers donde se alojarán los archivos SQL:
DUMP_DIR=/var/backups


Como ejecutar una actualización desde la versión X a la versión Y:

Ingresar al directorio from-X-to-Y:

```cd from-X-to-Y```

Antes de realizar la migración, este directorio debe contener los archivos listos para generar la base de datos y ejecutar la actualización. Esto implica:

- Copiar en el directorio from-X-to-Y/sql el archivo con el dump completo de la base de datos del OJS versión X . El nombre del archivo debe ser el especificado previamente en la variable DUMP_FILE:

- En caso de ser necesario, copiar en el directorio from-X-to-Y/sql el archivo que contenga los comandos SQL a ejecutarse luego de importar la base de datos original, y antes de ejecutar la actualización hacia la versión Y. El nombre de este archiv odebe ser e lespecificado previamente en la variable POST_DUMP_FILE

- Asegurarse que el stack definido en el archivo from-X-to-Y/docker-compose.yml cumple con los requerimientos para ejecutar OJS versión Y. En particular, debe observarse que la versión de PHP sea adecuada en la línea "image: webdevops/php-apache-dev:PHP_VERSION" 

Por ejemplo, para ejecutar una actualización hacia OJS 3.2, puede utilizarse PHP 7.3, especificada de la siguiente forma:
image: webdevops/php-apache-dev:7.4


- Descomprimir en el directorio from-X-to-Y/public_ojs una copia de OJS versión Y. 

- Asignar permisos de lectura y escritura sobre el directorio de cache de OJS:
chmod a+rw from-X-to-Y/public_ojs/cache -R

- Generar un archivo de configuración para OJS versión Y:
cp from-X-to-Y/public_ojs/config.TEMPLATE.inc.php from-X-to-Y/public_ojs/config.inc.php

- Editar el archivo config.inc.php generado en el paso previo, y colocar allí la configuración necesaria que OJS versión Y se ejecute desde el container docker:

base_url = "http://localhost"
You might also need to set override settings, such as:
base_url[SOME_JOURNAL] = http://localhost/SOME_JOURNAL

[database]

driver = mysqli
host =  mysql
username = root
password = <--- same as password set in .env
name = <--- same as database set in .env

[files]
files_dir = /var/ojs-data/uploads
public_files_dir = public



Hasta aquí, se cuenta con un entorno de ejecución de OJS versión Y, y con una copia de la base de datos de OJS versión X. Ahora es hora de utilizar los scripts de automatización de tareas para regenerar la base de datos en versión X, así como también para ejecutar las migraciones:

make upY: inicia los containers docker para OJS versión Y
make regenerateY  :  regenera la base de datos desde la versión X, y ejecuta los scripts SQL previos a la actualización hacia la versión Y
make upgradeY: ejecuta los scripts de actualización hacia la versión Y
make downY: detiene los containers dokcer para OJS version Y


En caso que la migración falle, será necesario volver a generar la base de datos (make regenerateY) . Esto eliminará la base de datos actual y volverá a generarla a partir del backup. Una vez que se restauró, se deberán realizar las correcciones que provocaron el fallo en el intento anterior. Si estas correcciones requieren modificar la base de datos (eliminar nulls, revisar codificacion, etc.), estos comandos deberían incorporarse al archivo POST_DUMP_FILE a fin de automatizar su ejecución en futuras pruebas.
Luego de realizadas estas correcciones, se puede volver a intentar la migración


