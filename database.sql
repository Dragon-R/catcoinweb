CREATE TABLE usuario(
	id_usuario INT(11) AUTO_INCREMENT PRIMARY KEY,
	alias VARCHAR(15) NOT NULL,
	nombre VARCHAR(30) NOT NULL,
	genero VARCHAR(9) NOT NULL,
	email VARCHAR(50) NOT NULL,
	fecha_nac DATE NOT NULL,
	contrasena VARCHAR(16) NOT NULL,
	pais VARCHAR(50),
	ciudad VARCHAR(50),
	direccion VARCHAR(50)
);

CREATE TABLE metodo_pago(
	id_pago INT(11) AUTO_INCREMENT PRIMARY KEY,
	nro_tarjeta VARCHAR(30),
	fecha_venc DATE,
	tigo_money VARCHAR(50),
	paypal VARCHAR(50),
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE juego(
	id_juego INT(11) AUTO_INCREMENT PRIMARY KEY,
	descripcion VARCHAR(150),
	fecha_inicio DATETIME,
	fecha_fin DATETIME,
	monto DOUBLE,
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE gana(
	id_usuario INT,
	id_juego INT,
	vict_derr CHAR(1),
	monto_gan DOUBLE,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
	FOREIGN KEY (id_juego) REFERENCES juego(id_juego)
);



/* temporal */
SELECT usuarios.nombres
	FROM usuarios
    WHERE usuarios.id_usuario = 1;
SELECT crea_unen.id_usuario, crea_unen.id_partida, crea_unen.vict_derr
	FROM crea_unen
    WHERE crea_unen.id_usuario = 1;
SELECT partidas.cantidad * partidas.monto AS ganacia
	FROM partidas;



/* Victorias y derrotas en partidas y monto ganado por usuario */
CREATE VIEW victorias_derrotas AS
	SELECT usuarios.alias, crea_unen.vict_derr, partidas.cantidad, partidas.monto, partidas.cantidad * partidas.monto AS ganancia
	FROM usuarios
	JOIN crea_unen
    ON usuarios.id_usuario = crea_unen.id_usuario
    JOIN partidas
    ON crea_unen.id_partida = partidas.id_partida;

/* opcional agragar al anterior */
    WHERE crea_unen.vict_derr = 1;



/* Ganadores de partidas y monto ganado por usuario */
CREATE VIEW victorias AS
SELECT usuarios.alias, crea_unen.vict_derr, partidas.cantidad, partidas.monto, partidas.cantidad * partidas.monto AS ganancia
	FROM usuarios
	JOIN crea_unen
    ON usuarios.id_usuario = crea_unen.id_usuario
    JOIN partidas
    ON crea_unen.id_partida = partidas.id_partida
    WHERE crea_unen.vict_derr = 1;


/* Ganancias totales por usuario */
CREATE VIEW ganancias AS
	SELECT usuarios.nombres, usuarios.apellidos, crea_unen.vict_derr, partidas.monto, SUM(partidas.cantidad * partidas.monto) AS ganancia
	FROM usuarios
	JOIN crea_unen
    ON usuarios.id_usuario = crea_unen.id_usuario
    JOIN partidas
    ON crea_unen.id_partida = partidas.id_partida
    WHERE crea_unen.vict_derr = 1
    GROUP BY usuarios.nombres;


/* agragar usuarios */
CREATE PROCEDURE new_user
(
    IN alias VARCHAR(10),
	IN nombres VARCHAR(50),
    IN apellidos VARCHAR(50),
	IN genero VARCHAR(9),
	IN correo VARCHAR(80),
	IN contrasena VARCHAR(255),
	IN nacimiento DATE,
	IN pais VARCHAR(30),
	IN ciudad VARCHAR(30)
    BEGIN
    INSERT INTO lector (nombre, apellido, direccion) VALUES (nombre, apellido, direccion);
	INSERT INTO usuarios (alias, nombres, apellidos, genero, correo, contrasena, nacimiento, pais, ciudad) VALUES (alias, nombres, apellidos, genero, correo, contrasena, nacimiento, pais, ciudad);
    END//