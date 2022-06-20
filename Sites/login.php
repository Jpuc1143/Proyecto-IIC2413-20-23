<?php
	session_start();
	$msg = $_GET['msg']
?>
<?php include("header.html") ?>
<body>
	<center><h2>Ingrese su nombre de usuario y contraseña</h2></center>
	<br>
    <form class="form-signin" role="form" action="login_validation.php" method="post">
        <?php echo $msg; ?>
        <center><input type="text" name="username" placeholder="Nombre de Usuario" required autofocus></center>
        <br>
        <hr>
        <center><input type="password" name="password" placeholder="Contraseña" required></center>
        <br>
        <hr>
        <center><button type="submit" name="login"> Iniciar sesión </button></center>
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