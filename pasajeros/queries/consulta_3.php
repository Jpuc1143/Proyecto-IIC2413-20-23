<?php
require("./config/databaseconnect.php");
#Mostrar reservas actuales pasajero
#agregar método _POST
$id = 23679;
$query3 = "SELECT codigo 
        FROM reserva 
        WHERE cliente_id = :id;";
$result3 = $db2 -> prepare($query3);
$result3 -> bindParam(":id", $id);
$result3 -> execute();
$data3 = $result3 -> fetchAll();
?>