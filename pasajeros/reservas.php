<!DOCTYPE html>
<html>
<body>
<?php
require("./config/databaseconnect.php");

$fecha = $_POST["fecha"];
$ciudad_o = $_POST["origen"];
$ciudad_d = $_POST["destino"];

$query2 = "SELECT nombre_ciudad
            FROM ciudad
            WHERE ciudad_id = $ciudad_d
            ;";
$result2 = $db -> prepare($query2);
$result2 -> execute();
$data2 = $result2 -> fetchAll();

$query3 = "SELECT nombre_ciudad
            FROM ciudad
            WHERE ciudad_id = $ciudad_o
            ;";
$result3 = $db -> prepare($query3);
$result3 -> execute(); 
$data3 = $result3 -> fetchAll();

$dat3 = $data3[0][0];
$dat2 = $data2[0][0];

$query = "SELECT *
            FROM vuelo, aerodromo, ciudad, ciudad AS c_dos, aerodromo AS dos
            WHERE vuelo.aerodromo_salida = aerodromo.aerodromo_id
            AND vuelo.estado = 'aceptado'
            AND aerodromo.ciudad_id = ciudad.ciudad_id
            AND vuelo.fecha_salida = $fecha
            AND vuelo.aerodromo_llegada = dos.aerodromo_id
            AND ciudad.nombre_ciudad = $dat3
            AND c_dos.nombre_ciudad = $dat2
            ;";
$result = $db -> prepare($query);
$result -> execute();
$data = $result -> fetchAll();

echo "Vuelos disponibles para la fecha $fecha entre las ciudades ", $data3[0][0], " y ", $data2[0][0];
print_r($data)
?>
<form action="ruta">
	<input type="text" name="pasaporte_1" value="Código de Pasaporte">
    <input type="text" name="pasaporte_2" value="Código de Pasaporte">
    <input type="text" name="pasaporte_3" value="Código de Pasaporte">
	<button>enviar</button>
</form>
</body>
</html>