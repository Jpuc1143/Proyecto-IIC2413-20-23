<?php
require("./config/databaseconnect.php");
$codigo = $_POST["codigo"];
$query = "SELECT aceptar(:codigo);";
    $result = $db -> prepare($query);
    $result  -> bindParam("codigo", $codigo);
    $result -> execute();
    $data = $result -> fetchAll();
$query = "SELECT aceptar_vuelo(:codigo);";
    $result = $db2 -> prepare($query);
    $result  -> bindParam("codigo", $codigo);
    $result -> execute();
    $data = $result -> fetchAll();
?>


<?php 
    	session_start();
    	$_SESSION['msg'] = "La propuesta de vuelo $codigo ha sido aceptada.";
	$_SESSION['msg_class'] = "info";
    	header("Location: ./perfil.php");
	exit();
?>
