<?php
require("./config/databaseconnect.php"); 
#agregar método _POST
$username = 'Zachary Davenport';
$id = 23679;
$query = "SELECT pasaporte, nombre
        FROM persona
        WHERE nombre = :username
        AND id = :id;";
$result = $db2 -> prepare($query);
$result -> bindParam(":username", $username);
$result -> bindParam(":id", $id);
$result -> execute();
$data = $result -> fetchAll();
 ?>