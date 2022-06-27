<?php
require("./config/databaseconnect.php"); 
$fecha = strtotime('2022-05-19');
$newformat = date('Y-m-d',$fecha);
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
            AND vuelo.fecha_salida = CAST('$newformat' AS DATE)
            ;";
$result = $db -> prepare($query);
$result -> execute();
$data = $result -> fetchAll();
print_r($data)
?>