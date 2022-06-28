<?php
require("./config/databaseconnect.php");
require("queries/mapa.php");

$inicial = $_POST["f_init"];
$final = $_POST["f_fin"];
$query = "SELECT *, aerodromo_salida as aerodromo_salida_id, aerodromo_llegada as aerodromo_llegada_id
          FROM propuestas, vuelo 
          WHERE propuestas.vuelo_id = vuelo.vuelo_id AND vuelo.estado = 'pendiente' AND propuestas.fecha_envio BETWEEN '$inicial' AND '$final';";
    $result = $db -> prepare($query);
    $result -> execute();
    $data = $result -> fetchAll();
?>

<?php require("header.php"); ?>
<table>
    <tr>
        <th> ID propuesta: </th>
        <th> Fecha envío: </th>
        <th> Compañía: </th>
        <th> Estado: </th>
        <th> Código: </th>
        <th> Fecha salida: </th>
        <th> Fecha llegada: </th>
        <th> Aerodromo salida: </th>
        <th> Aerodromo llegada: </th>
        <th> ID Aeronave: <t/>
    </tr>
    <?php foreach ($data as $d): ?>
        <tr>
            <td><?php echo $d[0]; ?></td>
            <td><?php echo $d[1]; ?></td>
            <td><?php echo $d[2]; ?></td>
            <td><?php echo $d[5]; ?></td>
            <td><?php echo $d[6]; ?></td>
            <td><?php echo $d[7]; ?></td>
            <td><?php echo $d[8]; ?></td>
            <td><?php echo $d[9]; ?></td>
            <td><?php echo $d[10]; ?></td>
            <td><?php echo $d[11]; ?></td>
            <td>
                <form method="post" action="aceptar_propuesta.php">
                    <input type="hidden" value='<?php echo $d[6]; ?>' name="codigo"/>
                    <input type="submit" value="aceptar"/>
                </form>
            </td>
            <td>
                <form method="post" action="rechazar_propuesta.php">
                <input type="hidden" name="codigo" value='<?php echo $d[6]; ?>'/>    
                <input type="submit" name="enviar" value="rechazar"/>
                </form>
            </td>
        </tr>
        <?php endforeach ?>

    </table>
<?php mostrarMapa($data, false); ?>
<?php require("footer.html"); ?>
