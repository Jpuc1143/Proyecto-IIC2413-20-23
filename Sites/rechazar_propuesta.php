<?php
require("./config/databaseconnect.php");
$codigo = $_POST["codigo"];
$query = "SELECT rechazar(:codigo);";
    $result = $db -> prepare($query);
    $result -> bindParam("codigo", $codigo);
    $result -> execute();
    $data = $result -> fetchAll();
$query = "SELECT rechazar_vuelo(:codigo);";
    $result = $db2 -> prepare($query);
    $result -> bindParam("codigo", $codigo);
    $result -> execute();
    $data = $result -> fetchAll();
?>

<body>

    <h1>Se ha actualizado el estado</h1>

</body>
