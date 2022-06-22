<?php 
session_start();
unset($_SESSION['usuario_id']);
unset($_SESSION['usuario_nombre']);
unset($_SESSION['usuario_tipo']);
header('Refresh: 0; url = ../index.php');
exit();
?>
