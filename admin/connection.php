<?php
  try {
    $user = 'grupo20';
    $password = 'IsayClau';
    $databaseName = 'grupo20e3';
    $db = new PDO("pgsql:dbname=$databaseName;host=localhost;port=5432;user=$user;password=$password");
    $user2 = 'grupo20';
    $password2 = 'IsayClau';
    $databaseName2 = 'grupo23e3';
    $db2 = new PDO("pgsql:dbname=$databaseName2;host=localhost;port=5432;user=$user2;password=$password2");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>