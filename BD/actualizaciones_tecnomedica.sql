ALTER TABLE `categoria` ADD `orden` INT NOT NULL ; 
ALTER TABLE `producto` ADD `catalogo` VARCHAR(100) DEFAULT NULL; 
ALTER TABLE `producto` ADD `estado` INT(1) NOT NULL DEFAULT '1' ; 