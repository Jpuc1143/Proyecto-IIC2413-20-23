<?php
require("./config/databaseconnect.php");

$reservador = $_POST['reservador'];
$vuelo = $_POST['vuelo'];
$p1 = $_POST['pasaporte_1'];
$p2 = $_POST['pasaporte_2'];
$p3 = $_POST['pasaporte_3'];

$query4 = "SELECT *
            FROM vuelo
            WHERE vuelo_id = :vuelo
            ;";
$result4 = $db -> prepare($query4);
$result4 -> bindParam(":vuelo",$vuelo);
$result4 -> execute();
$data4 = $result4 -> fetchAll();
$codigo_vuelo = $data4[0]['codigo'];

$db2 -> exec("CALL insertar_reserva($reservador, 'AAAA')");
$db2 -> exec("CALL insertar_ticket($vuelo, $reservador, 'Turista', t)");

session_start();
$_SESSION["msg"] = "Reserva completada";
header("./perfil.php");
exit();
?>
