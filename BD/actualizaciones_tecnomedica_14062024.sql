-- Altera la tabla de categorias 
ALTER TABLE `categoria` ADD `orden` INT NOT NULL ; -- con una nueva columna de orden
ALTER TABLE `categoria` ADD `destacado` INT(1) NOT NULL DEFAULT '0' ; -- con una comlumna para destacar

-- Altera la tabla de productos con las nuevas columnas catalogo y estado
ALTER TABLE `producto` ADD `catalogo` VARCHAR(100) DEFAULT NULL; 
ALTER TABLE `producto` ADD `estado` INT(1) NOT NULL DEFAULT '1' ; 

-- Inserta la página de Home con la sección de Carousel
INSERT INTO `pagina` (`id_pagina`, `nombre`, `url`) VALUES (NULL, 'Home', '../'); 
INSERT INTO `pagina_seccion` (`id_seccion`, `id_pagina`, `nombre`) VALUES (NULL, '2', 'Carousel'); 

-- Altera la tabla seccion_detalle para que el campo tipo no acepte nulos   
ALTER TABLE `seccion_detalle` CHANGE `tipo` `tipo` VARCHAR(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL; 

-- Inserta elementos a la seccion carousel de la pagina home
INSERT INTO `seccion_detalle` (`id_detalle`, `id_seccion`, `nombre`, `valor`, `estado`, `tipo`, `extras`) 
VALUES (NULL, '6', 'Imagen 1', NULL, '1', 'file', '{\r\n   \"indicaciones\":{\r\n      \"1\":\"Se permite la subida de imágenes\",\r\n      \"2\":\"Extensiones permitidas: jpg,jpeg,gif y png\",\r\n      \"3\":\"Peso máximo: 3 MB\",\r\n      \"4\":\"Dimensiones máximas: 1780x440\"\r\n   },\r\n   \"config\" : {\r\n      \"max_dims\" : \"1780, 440\"\r\n   }\r\n}'), 
    (NULL, '6', 'Imagen 2', NULL, '1', 'file', '{\r\n   \"indicaciones\":{\r\n      \"1\":\"Se permite la subida de imágenes\",\r\n      \"2\":\"Extensiones permitidas: jpg,jpeg,gif y png\",\r\n      \"3\":\"Peso máximo: 3 MB\",\r\n      \"4\":\"Dimensiones máximas: 1780x440\"\r\n   },\r\n   \"config\" : {\r\n      \"max_dims\" : \"1780, 440\"\r\n   }\r\n}'), 
    (NULL, '6', 'Imagen 3', NULL, '1', 'file', '{\r\n   \"indicaciones\":{\r\n      \"1\":\"Se permite la subida de imágenes\",\r\n      \"2\":\"Extensiones permitidas: jpg,jpeg,gif y png\",\r\n      \"3\":\"Peso máximo: 3 MB\",\r\n      \"4\":\"Dimensiones máximas: 1780x440\"\r\n   },\r\n   \"config\" : {\r\n      \"max_dims\" : \"1780, 440\"\r\n   }\r\n}'), 
    (NULL, '6', 'Imagen 4', NULL, '1', 'file', '{\r\n   \"indicaciones\":{\r\n      \"1\":\"Se permite la subida de imágenes\",\r\n      \"2\":\"Extensiones permitidas: jpg,jpeg,gif y png\",\r\n      \"3\":\"Peso máximo: 3 MB\",\r\n      \"4\":\"Dimensiones máximas: 1780x440\"\r\n   },\r\n   \"config\" : {\r\n      \"max_dims\" : \"1780, 440\"\r\n   }\r\n}'), 
    (NULL, '6', 'Imagen 5', NULL, '1', 'file', '{\r\n   \"indicaciones\":{\r\n      \"1\":\"Se permite la subida de imágenes\",\r\n      \"2\":\"Extensiones permitidas: jpg,jpeg,gif y png\",\r\n      \"3\":\"Peso máximo: 3 MB\",\r\n      \"4\":\"Dimensiones máximas: 1780x440\"\r\n   },\r\n   \"config\" : {\r\n      \"max_dims\" : \"1780, 440\"\r\n   }\r\n}');

-- Inserta la página de footer con la sección de siguenos
INSERT INTO `pagina` (`id_pagina`, `nombre`, `url`) VALUES (NULL, 'Template(Footer)', '../'); 
INSERT INTO `pagina_seccion` (`id_seccion`, `id_pagina`, `nombre`) VALUES (NULL, '3', 'Síguenos'); 

-- Inserta los registros de la sección de siguenos
INSERT INTO `seccion_detalle` (`id_detalle`, `id_seccion`, `nombre`, `valor`, `estado`, `tipo`, `extras`) 
VALUES (NULL, '7', 'Facebook', 'www.facebook.com', '1', 'text', NULL), 
(NULL, '7', 'Instagram', 'www.instagram.com', '1', 'text', NULL), 
(NULL, '7', 'LinkedIn', 'www.linkedin.com', '1', 'text', NULL), 
(NULL, '7', 'WhatsApp', 'www.whatsapp.com', '1', 'text', NULL); 