<!DOCTYPE html>
<html>
<body>
<?php
require("./config/databaseconnect.php"); 
$id = $_POST["id"];
$username = $_POST["username"];

$query = "SELECT username, pasaporte
        FROM persona, usuario
        WHERE username LIKE '%$username%' 
        AND persona.id LIKE '%$id%'";
$result = $db2 -> prepare($query);
$result -> execute();
$data = $result -> fetchAll();

$query2 = "SELECT ciudad_id, nombre_ciudad
        FROM ciudad
        ORDER BY nombre_ciudad DESC";
$result2 = $db -> prepare($query);
$result2 -> execute();
$data2 = $result -> fetchAll();
?>

<table>
    <tr>
        <th> Nombre: </th>
        <th> Pasaporte: <t/>
    </tr>
    <?php foreach ($data as $d); ?>
        <tr>
            <td><?php echo $d[0]; ?></td>
            <td><?php echo $d[1]; ?></td>
        </tr>
</table>

<table>
    <tr>
        <th> Reservas Actuales: </th>
    </tr>
    <?php foreach ($data3 as $d3); ?>
        <tr>
            <td><?php 
            $i = 0;
            while($i < count($d3))
            {
	            echo $d3[$i]."\n";
	            $i++;
            } ?></td>
        </tr>
</table>


<form action="reservas.php" method="post" target="_blanck">
    <div>Seleccione Fecha de salida <input type="date" name = "fecha" value="Fecha de Despegue"></div>
    <div>Seleccione Ciudad de Origen <select name="origen" id="ciudad_o">
    <?php 
        foreach($data2 as $d2 => $id){
            ?>
            <option value="<?php echo $id; ?>"><?php echo $d2; ?></option>
            <?php
        };
    ?></select></div>
    <div>Seleccione Ciudad de Destino
    <select name="destino" id="ciudad_d">
    <?php 
        foreach($data2 as $d2 => $id){
            ?>
            <option value="<?php echo $id; ?>"><?php echo $d2; ?></option>
            <?php
        };
    ?></select></div>
    <div><input type="submit" value="Buscar"></div>
</form>
</body>
</html>