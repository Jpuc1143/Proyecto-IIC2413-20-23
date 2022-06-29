<!DOCTYPE html>
<html>
<body>
<?php
require("./config/databaseconnect.php");

$fecha = $_POST["fecha"];
$fecha2 = strtotime($_POST["fecha"]);
$newformat = date('Y-m-d',$fecha2);
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

$query = "SELECT *
            FROM vuelo, aerodromos, ciudad, ciudad AS c_dos, aerodromos AS dos
            WHERE vuelo.aerodromo_salida = aerodromos.aerodromo_id
            AND vuelo.estado = 'aceptado'
            AND aerodromos.ciudad_id = ciudad.ciudad_id
            AND vuelo.aerodromo_llegada = dos.aerodromo_id
            AND c_dos.ciudad_id = $ciudad_d
            AND ciudad.ciudad_id = $ciudad_o
            AND vuelo.fecha_salida = CAST('$newformat' AS DATE)
            ;";
$result = $db -> prepare($query);
$result -> execute();
$data = $result -> fetchAll();

$dat3 = $data3[0][0];
$dat2 = $data2[0][0];

echo "Vuelos disponibles para la fecha $fecha entre las ciudades ", $data3[0][0], " y ", $data2[0][0];
?>

<form action="verificar.php" method="post" target="_blanck">
    <div>Seleccione vuelo
    <select name="vuelo" id="vuelo">
        <option value= ""> Código Vuelo/Fecha Salida/Fecha LLegada/Aerodromo Salida/Aerodromo Llegada/Ciudad Salida/Ciudad Llegada</option>
    <?php 
        foreach($data as $d => $reserva){
            ?>
            <option value="<?php echo $reserva['vuelo_id']; ?>">
            <?php   echo $reserva['codigo']; 
                    echo $reserva['fecha_salida'];
                    echo $reserva['fecha_llegada'];
                    echo $reserva[11]; 
                    echo $reserva['nombre'];
                    echo $reserva[15];
                    echo $reserva['nombre_ciudad'];?></option>
            <?php
        };
    ?></select></div>
    <table>
    <th>Ingrese pasaporte de los viajeros</th>
    <tr>
    <td><input type="text" name="pasaporte_1" value="Código de Pasaporte">
        <input type="text" name="pasaporte_2" value="Código de Pasaporte">
        <input type="text" name="pasaporte_3" value="Código de Pasaporte">
    </tr>
    </table>
	<button type="submit" value="Buscar"> Reservar</div>
</form>
</body>
</html>