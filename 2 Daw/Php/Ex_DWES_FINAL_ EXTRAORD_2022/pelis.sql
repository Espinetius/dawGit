

DROP TABLE IF EXISTS  pelis;
CREATE TABLE pelis (
   id int(4) NOT NULL AUTO_INCREMENT,
   nombre varchar(40) NOT NULL,
   anio varchar(4) NOT NULL,
   caratula varchar(50) NOT NULL,
  
   PRIMARY KEY (id)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pelis`
--

INSERT INTO pelis VALUES
(1, 'Drácula', '1973', 'dracula.jpg'),
(2, 'Blade', '1998', 'blade.jpg'),
(3, 'Troya', '2004', 'troya.jpg'),
(4, 'Bailando con Lobos', '1990', 'Bailando-con-lobos2.jpg'),
(5, 'Indiana Jones en busca del Arca Perdida', '1981', 'indianaJones.jpg'),
(6, 'Torrente, el brazo tonto de la ley', '1998', 'torrente_el_brazo_tonto_de_la_ley.jpg'),
(7, 'Spiderman', '2002', 'spiderman.jpg'),
(8, 'Durante la Tormenta', '2018', 'durante_la_tormenta.jpg'),
(9, 'ET', '1980', 'ET.jpg'),
(10, 'El golpe', '1972', 'El_golpe2.jpg'),
(11, 'Los Otros', '2001', 'losotros.jpg'),
(12, 'El Exorcista', '1973', 'exorcista.jpg'),
(15, 'La Mision', '1986', 'laMision.jpg'),
(16, 'El Gran Showman', '2017', 'GranShowman.jpg'),
(17, 'Mamma Mía Una y Otra Vez', '2018', 'mammamia2.jpg'),
(18, 'El golpe3', '2000', 'El_golpe2.jpg'),
(19, 'La Tribu', '2018', 'LaTribu.jpg');