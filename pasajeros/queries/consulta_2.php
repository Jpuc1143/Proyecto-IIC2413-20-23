<?php
require("./config/databaseconnect.php"); 
#Mostrar ciudades para viajes
$query2 = "SELECT ciudad_id, nombre_ciudad
        FROM ciudad
        ORDER BY nombre_ciudad ;";
$result2 = $db -> prepare($query2);
$result2 -> execute();
$data2 = $result2 -> fetchAll();
?>