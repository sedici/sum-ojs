#!/bin/bash

#Name of the database to be restaured. Warning: it will be deleted!!!
DB_NAME="ojs3"

#user and password to grant all privileges
DB_OJS_USER="ojs3"
DB_OJS_PASSWORD="revistasOJS"
DB_OJS_HOST="localhost"

#FILE CONTAINING A FULL BACKUP OF OJS
BACKUP_FILE="./data/data/ojs/ojs3.01022022.sql"

DB_ROOT_USER="-u root"
DB_ROOT_PASSWORD=""

mysql $DB_ROOT_USER $DB_ROOT_PASSWORD -p -e "DROP DATABASE $DB_NAME"
mysql $DB_ROOT_USER $DB_ROOT_PASSWORD -p -e "CREATE DATABASE $DB_NAME"
mysql $DB_ROOT_USER $DB_ROOT_PASSWORD -p -e "GRANT ALL PRIVILEGES ON  $DB_NAME.* to '$DB_OJS_USER'@'$DB_OJS_HOST' identified by '$DB_OJS_PASSWORD'"
mysql $DB_ROOT_USER $DB_ROOT_PASSWORD -p -e  "FLUSH PRIVILEGES"


#drop database ojs3;
#create database ojs3;
#grant all privileges on ojs3.* to 'ojs3'@'localhost' identified by 'revistillasUNLP';
#flush privileges;

mysql $DB_ROOT_USER $DB_ROOT_PASSWORD $DB_NAME < $BACKUP_FILE
