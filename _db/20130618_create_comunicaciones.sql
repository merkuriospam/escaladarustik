CREATE  TABLE `comunicaciones` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `entrada_id` INT NULL DEFAULT NULL ,
  `segmento_id` INT NULL DEFAULT NULL ,
  `html_body` TEXT NULL DEFAULT NULL ,
  `text_body` TEXT NULL DEFAULT NULL ,
  `usuario_id` INT NULL DEFAULT NULL ,
  `to` VARCHAR(500) NULL DEFAULT NULL ,
  `fecha_salida` DATETIME NULL DEFAULT NULL ,
  `estado` INT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) );