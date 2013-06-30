CREATE  TABLE `comunicaciones_buffer` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NULL DEFAULT NULL ,
  `to` VARCHAR(500) NULL DEFAULT NULL ,
  `entrada_id` INT NULL DEFAULT NULL ,
  `html_body` TEXT NULL DEFAULT NULL ,
  `text_body` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) );
  
ALTER TABLE `comunicaciones_buffer` ADD COLUMN `fecha_salida` DATETIME NULL DEFAULT NULL AFTER `text_body`, ADD COLUMN `estado` INT NULL DEFAULT 0 AFTER `fecha_salida` ;

