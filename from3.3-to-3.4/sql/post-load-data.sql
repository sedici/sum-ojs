# QUERIES PARA EJECUTAR ANTES DE MIGRAR DESDE 3.2 a 3.3
DELETE FROM authors WHERE publication_id IS NULL;

ALTER TABLE submission_files ENGINE=InnoDB; 

UPDATE `plugin_settings` SET `setting_value` = 'a:5:{i:0;s:4:\"UNLP\";i:2;s:6:\"SEDICI\";i:3;s:11:\"Informacion\";i:4;s:11:\"DORA_MEXICO\";i:5;s:11:\"suscripcion\";}' WHERE `plugin_settings`.`plugin_name` = 'customblockmanagerplugin' AND `plugin_settings`.`context_id` = 31 AND `plugin_settings`.`setting_name` = 'blocks'; 

DROP TABLE `catplug_categories`, `catplug_category_journal`, `catplug_category_settings`;
