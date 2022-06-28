<?php
require("./config/databaseconnect.php");
$codigo = $_POST["codigo"];
$query = "SELECT rechazar(:codigo);";
    $result = $db -> prepare($query);
    $result -> bindParam("codigo", $codigo);
    $result -> execute();
    $data = $result -> fetchAll();
$query = "SELECT rechazar_vuelo(:codigo);";
    $result = $db2 -> prepare($query);
    $result -> bindParam("codigo", $codigo);
    $result -> execute();
    $data = $result -> fetchAll();
?>

<?php 
       session_start();
       $_SESSION['msg'] = "La propuesta de vuelo $codigo ha sido rechazada.";
       $_SESSION['msg_class'] = "info";
       header("Location: ./perfil.php");
       exit();
?>
