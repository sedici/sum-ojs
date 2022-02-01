#!/bin/bash


SOURCE='user@host.remote:'
DESTINATION='.'

REMOTE_OJS_DIR='/var/www/ojs'
LOCAL_OJS_DIR='/ojs/'

REMOTE_DATA_DIR='/var/data'
LOCAL_DATA_DIR='/data/'

echo "Sincrinizando archivos del software OJS desde $SOURCE$REMOTE_OJS_DIR hacia $DESTINATION$LOCAL_OJS_DIR"
rsync -azP --exclude 'cache/*' "$SOURCE$REMOTE_OJS_DIR" "$DESTINATION$LOCAL_OJS_DIR"
echo "OJS sincronizado satisfactoriamente"

echo

echo "Sincronizando archivos de usuarios desde $SOURCE$REMOTE_DATA_DIR hadia $DESTINATION$LOCAL_DATA_DIR"
rsync -azP "$SOURCE$REMOTE_DATA_DIR" "$DESTINATION$LOCAL_DATA_DIR"
echo "Sincronizacion de archivos de usuarios completada satisfactoriamente"
