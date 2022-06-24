<!DOCTYPE html>
<html>
<body>
<?php
require("./config/databaseconnect.php");

print_r($_POST);
$fecha = $_POST["fecha"];
$ciudad_o = $_POST["origen"];
$ciudad_d = $_POST["destino"];

$query = "SELECT vuelo.codigo, vuelo.fecha_salida, vuelo.fecha_llegada, ciudad.nombre_ciudad, c_dos.nombre_ciudad
            FROM vuelo, aerodromo, ciudad, ciudad AS c_dos, aerodromo AS dos
            WHERE vuelo.aerodromo_salida = aerodromo.aerodromo_id
            AND vuelo.estado = 'aceptado'
            AND aerodromo.ciudad_id = ciudad.ciudad_id
            AND vuelo.fecha_salida LIKE '%$fecha%'
            AND vuelo.aerodromo_llegada = dos.aerodromo_id
            AND ciudad.nombre_ciudad LIKE '%$ciudad_o%'
            AND c_dos.nombre_ciudad LIKE '%$ciudad_d%'
            ";
$result = $db -> prepare($query);
$result -> execute();
$data = $result -> fetchAll();

echo "Vuelos disponibles para la fecha $fecha entre las ciudades $ciudad_o y $ciudad_d";
?>
<form action="ruta">
	<input type="text" name="pasaporte_1" value="Código de Pasaporte">
    <input type="text" name="pasaporte_2" value="Código de Pasaporte">
    <input type="text" name="pasaporte_3" value="Código de Pasaporte">
	<button>enviar</button>
</form>
</body>
</html>