<?php
require("connection.php");
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

</body>
