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
			echo 'admin';
			break;
		case 'compania_aerea':
			require("./compania_aerea.php");
			break;
		case 'pasajero':
			echo 'pasajero';
			break;
	}
}
?>

<?php require("footer.html"); ?>