<!DOCTYPE html>
<html>
<body>
<?php
require("./config/databaseconnect.php");

$username = 'Zachary Davenport';
$id = 23679;

#Muestra datos usuario
$query = "SELECT pasaporte, nombre
        FROM persona
        WHERE nombre = :username
        AND id = :id;";
$result = $db2 -> prepare($query);
$result -> bindParam(":username", $username);
$result -> bindParam(":id", $id);
$result -> execute();
$data = $result -> fetchAll();


#Muestra ciudades disponibles para vuelos
$query2 = "SELECT ciudad_id, nombre_ciudad
        FROM ciudad
        ORDER BY nombre_ciudad ;";
$result2 = $db -> prepare($query2);
$result2 -> execute();
$data2 = $result2 -> fetchAll();


#Muestra reservas del usuario
$query3 = "SELECT codigo 
        FROM reserva 
        WHERE cliente_id = :id;";
$result3 = $db2 -> prepare($query3);
$result3 -> bindParam(":id", $id);
$result3 -> execute();
$data3 = $result3 -> fetchAll();

?>

<table>
    <tr>
        <th> Nombre: </th>
        <th> Pasaporte: </th>
    </tr>
    <?php foreach ($data as $d => $value){?>
        <tr>
            <td><?php echo $data[0]['nombre']; ?></td>
            <td><?php echo $data[0]['pasaporte']; ?></td>
        </tr><?php
    }; ?>
</table>

<table>
    <tr>
        <th> Reservas Actuales: </th>
    </tr>
    <?php foreach ($data3 as $d3 => $reserva){ ?>
        <tr>
            <td><?php 
            echo $reserva[0]."\n";
	        ?></td>
        </tr><?php
    }; ?>
</table>


<form action="reservas.php" method="post" target="_blanck">
    <div>Seleccione Fecha de salida <input type="date" name = "fecha" value="Fecha de Despegue"></div>
    <div>Seleccione Ciudad de Origen <select name="origen" id="ciudad_o">
    <?php 
        foreach($data2 as $d2 => $id){
            ?>
            <option value="<?php echo $id['ciudad_id']; ?>"><?php echo $id['nombre_ciudad']; ?></option>
            <?php
        };
    ?></select></div>
    <div>Seleccione Ciudad de Destino
    <select name="destino" id="ciudad_d">
    <?php 
        foreach($data2 as $d2 => $id){
            ?>
            <option value="<?php echo $id['ciudad_id']; ?>"><?php echo $id['nombre_ciudad']; ?></option>
            <?php
        };
    ?></select></div>
    <div><button type="submit" value="Buscar"> Buscar</div>
</form>
</body>
</html> 