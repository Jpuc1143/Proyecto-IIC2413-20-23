<?php
require("./config/databaseconnect.php");

$inicial = $_POST["f_init"];
$final = $_POST["f_fin"];
if($inicial == $final){
    $query = "SELECT propuestas.fecha_envio, propuestas.compania_id, vuelo.estado
              FROM propuestas, vuelo
              WHERE propuestas.vuelo_id = vuelo.vuelo_id;";
}
else {
    $query = "SELECT propuestas.fecha_envio, propuestas.compania_id, vuelo.estado
              FROM propuestas, vuelo 
              WHERE propuestas.vuelo_id = vuelo.vuelo_id AND $inicial <= propuestas.fecha_envio <= $final;";
}
$result = $db -> prepare($query);
$result -> execute();
$data = $result -> fetchAll();
?>

<table>
    <tr>
        <th> Fecha Envio: </th>
        <th> Compañia: </th>
        <th> Estado: <t/>
    </tr>
    <?php foreach ($data as $d): ?>
        <tr>
            <td><?php echo $d[0]; ?></td>
            <td><?php echo $d[1]; ?></td>
            <td><?php echo $d[2]; ?></td>
        </tr>
        <?php endforeach ?>
</table>
