<?php
require("./config/databaseconnect.php");
$query = "SELECT *
          FROM propuestas, vuelo
          WHERE propuestas.vuelo_id = vuelo.vuelo_id AND vuelo.estado = 'pendiente';";
    $result = $db -> prepare($query);
    $result -> execute();
    $data = $result -> fetchAll();
    $header = array("ID propuesta", "Fecha envío", "Compañía", "Estado", "Código","Fecha salida","Fecha llegada","Aerodromo salida","Aerodromo llegada","ID Aeronave","Aceptar","Rechazar");
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
    <?php
        echo '<table class="table table-striped table-hover">';
        echo '<tbody>';
        for($i=0; $i<count($header); $i++) {
            echo '<th>'.$header[$i]."</th>";
        }
        echo '</tr></thead>';
        echo '<tbody>';
    ?>
    </tr>
    <?php
    echo '<table class="table table-striped table-hover">';
    echo '<tbody>';
    ?>
    <?php foreach ($data as $d): ?>
        <tr>
            <td><?php echo '<th>'.$d[0]."</th>"; ?></td>
            <td><?php echo '<th>'.$d[1]."</th>";; ?></td>
            <td><?php echo '<th>'.$d[2]."</th>";; ?></td>
            <td><?php echo '<th>'.$d[5]."</th>";; ?></td>
            <td><?php echo '<th>'.$d[6]."</th>";; ?></td>
            <td><?php echo '<th>'.$d[7]."</th>";; ?></td>
            <td><?php echo '<th>'.$d[8]."</th>";; ?></td>
            <td><?php echo '<th>'.$d[9]."</th>";; ?></td>
            <td><?php echo '<th>'.$d[10]."</th>";; ?></td>
            <td><?php echo '<th>'.$d[11]."</th>"; ?></td>
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

</body>
