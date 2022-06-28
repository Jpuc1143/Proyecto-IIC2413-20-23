<?php
  try {
    $user = 'grupo20';
    $password = 'isayclau';
    $databaseName = 'grupo20e3';
    $db = new PDO("pgsql:dbname=$databaseName;host=localhost;port=5432;user=$user;password=$password");
    $user2 = 'grupo23';
    $password2 = 'RinkuFry';
    $databaseName2 = 'grupo23e3';
    $db2 = new PDO("pgsql:dbname=$databaseName2;host=localhost;port=5432;user=$user2;password=$password2");

    $db -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $db2 -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>
