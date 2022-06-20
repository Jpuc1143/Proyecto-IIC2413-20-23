<?php
	session_start();
	$msg = $_GET['msg']
?>
<?php include("header.html") ?>
<body>
	<h2>Ingrese su nombre de usuario y contraseña</h2>
	<br>
    <form class="form-signin" role="form" action="login_validation.php" method="post">
        <?php echo $msg; ?>
        <input type="text" name="username" placeholder="Nombre de Usuario" required autofocus>
        <br>
        <hr>
        <input type="password" name="password" placeholder="Contraseña" required>
        <br>
        <hr>
        <button type="submit" name="login"> Iniciar sesión </button>
    </form>

</body>
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