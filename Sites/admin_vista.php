<?php
require("./config/databaseconnect.php");
$query = "SELECT *
          FROM propuestas, vuelo
          WHERE propuestas.vuelo_id = vuelo.vuelo_id AND vuelo.estado = 'pendiente';";
    $result = $db -> prepare($query);
    $result -> execute();
    $data = $result -> fetchAll();
    $header = array("ID propuesta", "Fecha envío", "Compañía", "Estado", "Código","Fecha salida","Fecha llegada","Aerodromo salida","Aerodromo llegada","ID Aeronave");
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
    <?php
        echo '<table class="table table-striped table-hover">';
        echo '<tbody>';
        for($i=0; $i<count($header); $i++) {
            echo '<th>'.$header[$i]."</th>";
        }
        echo '</tr></thead>';
        echo '<tbody>';
        for($i=0;$i<count($data);$i++) {
            echo "<tr>";
            foreach($data[$i] as $cell) {
                echo "<td>$cell</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
?>
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

</body>
