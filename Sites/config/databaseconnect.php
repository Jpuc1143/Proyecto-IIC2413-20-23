<?php
  try {
    $user = 'grupo20';
    $password = '098poiñlkmnb';
    $databaseName = 'grupo20e2';
    $db = new PDO("pgsql:dbname=$databaseName;host=localhost;port=5432;user=$user;password=$password");
    $user2 = 'grupo23';
    $password2 = '098poiñlkmnb';
    $databaseName2 = 'grupo23e2';
    $db2 = new PDO("pgsql:dbname=$databaseName2;host=localhost;port=5432;user=$user2;password=$password2");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>