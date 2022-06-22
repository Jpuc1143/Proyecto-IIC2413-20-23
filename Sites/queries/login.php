<?php
require("./queries/connection.php");

if (isset($_POST['usuario_nombre']) && isset($_POST["usuario_contrasena"])) {
	$result = $db_impar -> prepare("SELECT id, usuario, tipo FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena");
	$result -> bindParam("usuario", $_POST["usuario_nombre"]);
	$result -> bindParam("contrasena", $_POST["usuario_contrasena"]);

	$result -> execute();
	$data = $result -> fetchAll();

	if (isset($data[0])) {	
		$_SESSION['usuario_id'] = $data[0][0];
		$_SESSION['usuario_nombre'] = $data[0][1];
		$_SESSION['usuario_tipo'] = $data[0][2];
		
		header('Location: ./perfil.php');
		exit();
	} else {
		// TODO usuario no existe o mal contrasena
		echo ":(";
	}
} else {
	echo 'error';
	// TODO: error en la solicitud
}

?>
