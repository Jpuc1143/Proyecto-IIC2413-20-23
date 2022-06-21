<?php
require("./queries/connection.php");

$db_impar -> beginTransaction();

$db_impar -> exec("INSERT INTO Usuarios VALUES (default,'DGAC', 'admin', 'admin') ON CONFLICT DO NOTHING;");

// TODO contraseñas segun enunciado 
$db_impar -> exec("
	INSERT INTO usuarios (usuario, contrasena, tipo)
	SELECT codigo, '1234', 'compania_aerea' FROM compania_aerea ON CONFLICT DO NOTHING;");
$db_impar -> exec("
	INSERT INTO usuarios (usuario, contrasena, tipo)
	SELECT pasaporte, '1234', 'pasajero' FROM persona ON CONFLICT DO NOTHING;");

$db_impar -> commit();

?>
