<?php
	try {
		$db_impar_name = "grupo23e3";
		$db_impar_user = "grupo23";
		$db_impar_password = "RinkuFry";
		$db_impar = new PDO("pgsql:dbname=$db_impar_name;host=localhost;port=5432;user=$db_impar_user;password=$db_impar_password");
		$db_impar -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	} catch (Exception $e) {
		echo "No se pudo conectar a la db impar: $e";
	}
?>
