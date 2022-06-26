<?php include("header.html") ?>
<?php
require("connection.php");

if (isset($_SESSION['username'])){
    $codigo_compania_aerea = "%".$_SESSION["username"]."%";
} else {
    $codigo_compania_aerea = "%";
}
#query para pasar del codigo(username) a nombre compañia aerea
$query1 = "
SELECT compania_aerea.nombre
FROM vuelo
LEFT JOIN compania_aerea ON compania_aerea.codigo = vuelo.compania_codigo
WHERE compania_aerea.codigo = codigo_compania_aerea;
";
$result = $db -> prepare($query);
$result -> bindParam("codigo_compania_aerea", $codigo_compania_aerea);
$result -> execute();
$nombre_compania_aerea = $result -> fetchAll(PDO::FETCH_NUM);
#query para ver los vuelos aceptados de dicha compañia
$query_aceptados = "
SELECT codigo, compania_codigo, aeronave_codigo, fecha_salida, fecha_llegada
FROM vuelo
WHERE estado = 'aceptado' AND
compania_codigo = codigo_compania_aerea;
";
$result2 = $db -> prepare($query);
$result2 -> bindParam("codigo_compania_aerea", $codigo_compania_aerea);
$result2 -> execute();
$vuelos_aceptados = $result2 -> fetchAll(PDO::FETCH_NUM);
#query para ver los vuelos rechazados de dicha compañia
$query_rechazados = "
SELECT codigo, compania_codigo, aeronave_codigo, fecha_salida, fecha_llegada
FROM vuelo
WHERE estado = 'rechazado' AND
compania_codigo = codigo_compania_aerea;
";
$result3 = $db -> prepare($query);
$result3 -> bindParam("codigo_compania_aerea", $codigo_compania_aerea);
$result3 -> execute();
$vuelos_rechazados = $result3 -> fetchAll(PDO::FETCH_NUM);
?>
<body>
<?php 
    <h1>Vista de Compañia Aérea</h1>
    if (isset($_SESSION['username'])){
    <h2> Bienvenido echo $nombre_compania_aerea</h2>>
    <br>
    <hr>
    <h3> Su lista de vuelos aceptados es la siguiente</h3>
    if (isset($vuelos_aceptados)) {
        echo '<table class="table table-striped table-hover">';
        echo '<tbody>';
        for($i=0;$i<count($vuelos_aceptados);$i++) {
            echo "<tr>";
            if ($i=0){
                echo "<td>Código Vuelo</td>";
            };
            if ($i=1){
                echo "<td>Código Compañía Aérea</td>";
            };
            if ($i=2){
                echo "<td>Código Aeronave</td>";
            };
            if ($i=3){
                echo $i
                echo "<td>Fecha Salida</td>";
            }
            if ($i=4){
                echo "<td>Fecha Llegada</td>";
            };
            echo "</tr>";
        }
        for($i=0;$i<count($vuelos_aceptados);$i++) {
            echo "<tr>";
            foreach($vuelos_aceptados[$i] as $cell) {
                echo "<td>$cell</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
    }
    <br>
    <hr>
    <h3> Su lista de vuelos rechazados es la siguiente</h3>
    if (isset($vuelos_rechazados)) {
        echo '<table class="table table-striped table-hover">';
        echo '<tbody>';
        for($i=0;$i<count($vuelos_rechazados);$i++) {
            echo "<tr>";
            if ($i=0){
                echo "<td>Código Vuelo</td>";
            };
            if ($i=1){
                echo "<td>Código Compañía Aérea</td>";
            };
            if ($i=2){
                echo "<td>Código Aeronave</td>";
            };
            if ($i=3){
                echo "<td>Fecha Salida</td>";
            };
            if ($i=4){
                echo "<td>Fecha Llegada</td>";
            };
            echo "</tr>";
        }
        for($i=0;$i<count($vuelos_rechazados);$i++) {
            echo "<tr>";
            foreach($vuelos_rechazados[$i] as $cell) {
                echo "<td>$cell</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
    }
?> 
</body>
<style>
body {
  background-color: lightblue;
}

h1 {
  color: black;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 15px;
}
</style>
<?php include("footer.html") ?>