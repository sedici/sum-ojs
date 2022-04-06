--QUERIES PARA EJECUTAR ANTES DE MIGRAR DESDE 3.1 A 3.2

ALTER DATABASE ojsunlp CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE email_templates_data CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DELETE FROM citations WHERE citation_id IN (
   SELECT cid FROM ( 
         SELECT c.citation_id as cid FROM citations c LEFT JOIN submissions s ON (c.submission_id = s.submission_id) 
         WHERE s.submission_id IS NULL 
                  ) AS c );


DELETE FROM email_log WHERE assoc_id is null;
