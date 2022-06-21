<?php require("header.php") ?>

<center><h2>Ingrese su nombre de usuario y contraseña</h2></center>
<br>
<form class="form-signin" role="form" method="post">
	<?php echo $msg; ?>
	<center><input type="text" name="username" placeholder="Nombre de Usuario" required autofocus></center>
	<br>
	<center><input type="password" name="password" placeholder="Contraseña" required></center>
	<br>
	<center><button type="submit" name="login"> Iniciar sesión </button></center>
</form>
<hr>

<h2>Importar Usuarios</h2>
<form method="post">
	<input type="hidden" name="importar" value="1">
	<input type="submit" value="Empezar">
</form>


<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ($_POST["importar"] === "1") {
		require("./queries/importar.php");
	} else {
		// TODO: _POST login etc
		echo "Login!";
	}
}

?>

<style>
body {
  background-color: lightblue;
}

h1 {
  color: black;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 15px;
}
</style>

<?php include("footer.html") ?>
