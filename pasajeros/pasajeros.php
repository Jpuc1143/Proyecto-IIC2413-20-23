<!DOCTYPE html>
<html>
<body>
<?php
require("./queries/consulta_1.php");
require("./queries/consulta_2.php");
require("./queries/consulta_3.php");

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
    <?php foreach ($data3 as $d3){ ?>
        <tr>
            <td><?php 
            $i = 0;
            while($i < count($d3))
            {
	            echo $d3[$i]['codigo']."\n";
	            $i++;
            } ?></td>
        </tr><?php
    }; ?>
</table>


<form action="reservas.php" method="post" target="_blanck">
    <div>Seleccione Fecha de salida <input type="date" name = "fecha" value="Fecha de Despegue"></div>
    <div>Seleccione Ciudad de Origen <select name="origen" id="ciudad_o">
    <?php 
        foreach($data2 as $d2 => $id){
            ?>
            <option value="<?php echo $id; ?>"><?php echo $id['nombre_ciudad']; ?></option>
            <?php
        };
    ?></select></div>
    <div>Seleccione Ciudad de Destino
    <select name="destino" id="ciudad_d">
    <?php 
        foreach($data2 as $d2 => $id){
            ?>
            <option value="<?php echo $id; ?>"><?php echo $id['nombre_ciudad']; ?></option>
            <?php
        };
    ?></select></div>
    <div><input type="submit" value="Buscar"></div>
</form>
</body>
</html>