<?php 
session_start();

if (isset($_SESSION['usuario_id'])) {
	header('Location: ./perfil.php');
	exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST["importar"]) && $_POST["importar"] === "1") {
		require("./queries/importar.php");
	} else {
		require("./queries/login.php");
	}
}

?>
<?php
require("header.php");
require("queries/connection.php");
require("./queries/mapa.php");

$result = $db_impar -> prepare("SELECT aerodromo_salida_id, aerodromo_llegada_id FROM vuelo");
$result -> execute();
$vuelos = $result -> fetchAll(PDO::FETCH_ASSOC);

mostrarMapa($vuelos);
?>
<center><h2>Ingrese su nombre de usuario y contraseña</h2></center>
<br>
<form class="form-signin" role="form" method="post">
	<center><input type="text" name="usuario_nombre" placeholder="Nombre de Usuario" required autofocus></center>
	<br>
	<center><input type="password" name="usuario_contrasena" placeholder="Contraseña" required></center>
	<br>
	<center><button type="submit" name="login"> Iniciar sesión </button></center>
</form>
<hr>

<h2>Importar Usuarios</h2>
<form method="post">
	<input type="hidden" name="importar" value="1">
	<input type="submit" value="Empezar">
</form>

<?php include("footer.html") ?>
