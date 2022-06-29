<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
	header('Location: ./index.php');
	exit();
}

?>
<?php require("header.php"); ?>

<?php
if (isset($_SESSION['usuario_id'])) {
	switch ($_SESSION['usuario_tipo']) {
		case 'admin':
			require("./admin_vista.php");
			break;
		case 'compania_aerea':
			require("./compania_aerea.php");
			break;
		case 'pasajero':
			require("./pasajeros.php");
			break;
	}
}
?>

<?php require("footer.html"); ?>
