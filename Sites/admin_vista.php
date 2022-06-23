<?php
require("./config/databaseconnect.php");
$query = "SELECT propuestas.fecha_envio, propuestas.compania_id, vuelo.estado
              FROM propuestas, vuelo
              WHERE propuestas.vuelo_id = vuelo.vuelo_id;";
    $result = $db -> prepare($query);
    $result -> execute();
    $data = $result -> fetchAll();
?>

<body>

    <h1>Vista de Admin</h1>
    <form align="center" action="admin_consulta.php" method="post">
    Fecha Inicio:
    <input type="date" name="f_init">
    <br/>
    Fecha Termino:
    <input type="date" name="f_fin">
    <br/><br/>
    <input type="submit" value="Buscar">
    </form>

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

</body>

