<?php
require("./queries/connection.php");
require("./queries/mapa.php");

$codigo_compania_aerea = $_SESSION["usuario_nombre"];

#query para pasar del codigo(username) a nombre compañia aerea
$query1 = "
SELECT compania_aerea.nombre
FROM vuelo
LEFT JOIN compania_aerea ON compania_aerea.codigo = vuelo.compania_codigo
WHERE compania_aerea.codigo = :codigo_compania_aerea;
";
$result = $db_impar -> prepare($query1);
$result -> bindParam("codigo_compania_aerea", $codigo_compania_aerea);
$result -> execute();
$nombre_compania_aerea = $result -> fetchAll(PDO::FETCH_NUM)[0][0];

#query para ver los vuelos aceptados de dicha compañia
$query_aceptados = "
SELECT codigo, compania_codigo, aeronave_codigo, fecha_salida, fecha_llegada, aerodromo_salida_id, aerodromo_llegada_id
FROM vuelo
WHERE estado = 'aceptado' AND
compania_codigo = :codigo_compania_aerea;
";
$result2 = $db_impar -> prepare($query_aceptados);
$result2 -> bindParam("codigo_compania_aerea", $codigo_compania_aerea);
$result2 -> execute();
$vuelos_aceptados = $result2 -> fetchAll(PDO::FETCH_ASSOC);

#query para ver los vuelos rechazados de dicha compañia
$query_rechazados = "
SELECT codigo, compania_codigo, aeronave_codigo, fecha_salida, fecha_llegada
FROM vuelo
WHERE estado = 'rechazado' AND
compania_codigo = :codigo_compania_aerea;
";
$result3 = $db_impar -> prepare($query_rechazados);
$result3 -> bindParam("codigo_compania_aerea", $codigo_compania_aerea);
$result3 -> execute();
$vuelos_rechazados = $result3 -> fetchAll(PDO::FETCH_ASSOC);
?>
<?php	mostrar_mapa($vuelos_aceptados); ?>
    <h1>Vista de Compañia Aérea</h1>
<?php echo "<h2> Bienvenido $nombre_compania_aerea </h2>"; ?>
    <br>
    <hr>
    <h3> Su lista de vuelos aceptados es la siguiente</h3>
<?php
        echo '<table class="table table-striped table-hover">';
        echo '<tbody>';
        for($i=0;$i<count($vuelos_aceptados);$i++) {
            echo "<tr>";
            foreach($vuelos_aceptados[$i] as $cell) {
                echo "<td>$cell</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
?>
    <br>
    <hr>
    <h3> Su lista de vuelos rechazados es la siguiente</h3>
<?php   
	echo '<table class="table table-striped table-hover">';
        echo '<tbody>';
        for($i=0;$i<count($vuelos_rechazados);$i++) {
            echo "<tr>";
            foreach($vuelos_rechazados[$i] as $cell) {
                echo "<td>$cell</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
?> 
