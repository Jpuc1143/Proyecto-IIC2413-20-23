<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Grupo 23 — AirInfo</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	</head>
<body>
	<nav class="navbar fixed-top bg-info">
		<div class="container-fluid">
			<span class="navbar-brand text-light">AirInfo✈️</span>
		<?php if (isset($_SESSION['usuario_id'])) {
		echo '<a class="btn btn-danger" href="./logout.php">Logout</a>';
		}
		?>
	</nav>
	<main class="mx-5 pt-5 mt-5">
<?php 
	if (isset($_SESSION["msg"])) {
		if (isset($_SESSION["msg_class"])) {
			$msg_class = $_SESSION["msg_class"];
		} else {
			$msg_class = "danger";
		}
		echo '<div class="alert alert-'.$msg_class.'">'.$_SESSION['msg']."</div>";
		unset($_SESSION["msg"]);
		unset($_SESSION["msg_class"]);
	}
?>
