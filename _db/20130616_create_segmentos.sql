CREATE  TABLE `segmentos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) );

CREATE  TABLE `segmentos_usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `segmento_id` INT NULL ,
  `usuario_id` INT NULL ,
  PRIMARY KEY (`id`) );
  
INSERT INTO `segmentos` (`nombre`) VALUES ('todos');