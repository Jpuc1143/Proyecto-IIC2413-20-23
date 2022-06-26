<?php
require("./config/databaseconnect.php"); 
$fecha = strtotime('2022-05-19');
$dat2 = 7;
$dat3 = 8;
$query = "SELECT *
            FROM vuelo, aerodromos, ciudad, ciudad AS c_dos, aerodromos AS dos
            WHERE vuelo.aerodromo_salida = aerodromos.aerodromo_id
            AND vuelo.estado = 'aceptado'
            AND aerodromos.ciudad_id = ciudad.ciudad_id
            AND vuelo.aerodromo_llegada = dos.aerodromo_id
            AND c_dos.ciudad_id = $dat3
            AND ciudad.ciudad_id = $dat2
            AND vuelo.fechas_salida = $fecha
            ;";
$result = $db -> prepare($query);
$result -> execute();
$data = $result -> fetchAll();
print_r($data)
?>