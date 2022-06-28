<?php 
session_start();
unset($_SESSION['usuario_id']);
unset($_SESSION['usuario_nombre']);
unset($_SESSION['usuario_tipo']);
$_SESSION["msg"] = "Ha hecho log-out exitosamente";
$_SESSION["msg_class"] = "info";
header('Location: ./index.php');
exit();
?>
