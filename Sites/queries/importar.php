<?php
require("./queries/connection.php");

$db_impar -> beginTransaction();

$db_impar -> exec("INSERT INTO Usuarios VALUES (default,'DGAC', 'admin', 'admin') ON CONFLICT DO NOTHING;");

// TODO contraseñas segun enunciado 
$db_impar -> exec("
	INSERT INTO usuarios (usuario, contrasena, tipo)
	SELECT codigo, to_char(random()*100000000, 'fm00000000'),
	'compania_aerea' FROM compania_aerea ON CONFLICT DO NOTHING;");
$db_impar -> exec("
	INSERT INTO usuarios (usuario, contrasena, tipo)
	SELECT pasaporte, CONCAT(SUBSTRING(nombre, 1, 3),
		SUBSTRING(pasaporte, 1, 3), to_char(random() * 100, 'fm00')
	), 'pasajero' FROM persona ON CONFLICT DO NOTHING;");

$db_impar -> commit();

?>
