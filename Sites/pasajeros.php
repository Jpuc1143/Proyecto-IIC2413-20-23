<?php
require("./config/databaseconnect.php");

$username = $_SESSION['usuario_nombre'];

#Muestra datos usuario
$query = "SELECT pasaporte, nombre
        FROM persona
        WHERE pasaporte = :username;";
$result = $db2 -> prepare($query);
$result -> bindParam(":username", $username);
$result -> execute();
$data = $result -> fetchAll();


#Muestra ciudades disponibles para vuelos
$query2 = "SELECT id, nombre
        FROM ciudad
        ORDER BY nombre;";
$result2 = $db2 -> prepare($query2);
$result2 -> execute();
$data2 = $result2 -> fetchAll();

#Encuentra id de persona
$query4 = "SELECT id
        FROM persona
        WHERE pasaporte = :pasaporte;";
$result4 = $db2 -> prepare($query4);
$result4 -> bindParam(":pasaporte", $username);
$result4 -> execute();
$data4 = $result4 -> fetchAll();
$id = $data4[0]["id"];

#Muestra reservas del usuario
$query3 = "SELECT reserva.codigo 
        FROM reserva
        WHERE reserva.cliente_id = :id;";
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
            <option value="<?php echo $id['id']; ?>"><?php echo $id['nombre']; ?></option>
            <?php
        };
    ?></select></div>
    <div>Seleccione Ciudad de Destino
    <select name="destino" id="ciudad_d">
    <?php 
        foreach($data2 as $d2 => $id){
            ?>
            <option value="<?php echo $id['id']; ?>"><?php echo $id['nombre']; ?></option>
            <?php
        };
    ?></select></div>
    <div><input type='hidden' name='persona_id' value=<?php $data4[0][0] ?> />
    <div><button type="submit" value="Buscar"> Buscar</div>
</form>
