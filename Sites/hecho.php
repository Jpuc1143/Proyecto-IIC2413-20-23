<?php
// Desactivar toda las notificaciónes del PHP
error_reporting(0);

require("./config/databaseconnect.php");
$codigo_vuelo = $_POST['codigo_vuelo'];

#Encuentra id de vuelo
$query2 = "SELECT id
        FROM vuelo
        WHERE codigo = :codigo_vuelo 
        ;";
$result2 = $db2 -> prepare($query2);
$result2 -> bindParam(":codigo_vuelo", $codigo_vuelo);
$result2 -> execute();
$data2 = $result2 -> fetchAll();

$vuelo_id = $data2[0][0];
#-----------------------------------------------#
    $clase_1 = $_POST['clase_1'];
    $comida_y_maleta_1 = $_POST['agregar_1'];
    $pasaporte_1 = $_POST['pasaporte_1'];

    #Encuentra id de persona
    $query = "SELECT id
            FROM persona
            WHERE pasaporte = :pasaporte 
            ;";
    $result = $db2 -> prepare($query);
    $result -> bindParam(":pasaporte", $pasaporte_1);
    $result -> execute();
    $data = $result -> fetchAll();

    $persona_id_1 = $data[0][0];

    $query8 = "SELECT insertar_reserva(:cliente_id, :codigo);";
    $result8 = $db2 -> prepare($query8);
    $result8 -> bindParam(":cliente_id", $persona_id_1);
    $result8 -> bindParam(":codigo", $reserva_id);
    $result8 -> execute();
    $data8 = $result8 -> fetchAll();

    $query9 = "SELECT insertar_ticket(:vuelo_id, :persona_id, :clase, :comida_y_maleta);";
    $result9 = $db2 -> prepare($query9);
    $result9 -> bindParam(":persona_id", $persona_id_1);
    $result9 -> bindParam(":vuelo_id", $reserva_id);
    $result9 -> bindParam(":clase", $clase_1);
    $result9 -> bindParam(":comida_y_maleta", $comida_y_maleta_1);
    $result9 -> execute();
    $data9 = $result9 -> fetchAll();


    $clase_2 = $_POST['clase_2'];
    $comida_y_maleta_2 = $_POST['agregar_2'];
    $pasaporte_2 = $_POST['pasaporte_2'];

    #Encuentra id de persona
    $query6 = "SELECT id
    FROM persona
    WHERE pasaporte = :pasaporte 
    ;";
    $result6 = $db2 -> prepare($query6);
    $result6 -> bindParam(":pasaporte", $pasaporte_2);
    $result6 -> execute();
    $data6 = $result6 -> fetchAll();

    $persona_id_2 = $data6[0][0];

    $query10 = "SELECT insertar_reserva(:cliente_id, :codigo);";
    $result10 = $db2 -> prepare($query10);
    $result10 -> bindParam(":cliente_id", $persona_id_2);
    $result10 -> bindParam(":codigo", $reserva_id);
    $result10 -> execute();
    $data10 = $result10 -> fetchAll();

    $query11 = "SELECT insertar_ticket(:vuelo_id, :persona_id, :clase, :comida_y_maleta);";
    $result11 = $db2 -> prepare($query11);
    $result11 -> bindParam(":persona_id", $persona_id_2);
    $result11 -> bindParam(":vuelo_id", $reserva_id);
    $result11 -> bindParam(":clase", $clase_2);
    $result11 -> bindParam(":comida_y_maleta", $comida_y_maleta_2);
    $result11 -> execute();
    $data11 = $result11 -> fetchAll();


        $clase_3 = $_POST['clase_3'];
        $comida_y_maleta_3 = $_POST['agregar_3'];
        $pasaporte_3 = $_POST['pasaporte_3'];
        
        $query7 = "SELECT id
        FROM persona
        WHERE pasaporte = :pasaporte 
        ;";
        $result7 = $db2 -> prepare($query7);
        $result7 -> bindParam(":pasaporte", $pasaporte_3);
        $result7 -> execute();
        $data7 = $result7 -> fetchAll();

        $persona_id_3 = $data7[0][0];

        $query12 = "SELECT insertar_reserva(:cliente_id, :codigo);";
        $result12 = $db2 -> prepare($query12);
        $result12 -> bindParam(":cliente_id", $persona_id_3);
        $result12 -> bindParam(":codigo", $reserva_id);
        $result12 -> execute();
        $data12 = $result12 -> fetchAll();

        $query13 = "SELECT insertar_ticket(:vuelo_id, :persona_id, :clase, :comida_y_maleta);";
        $result13 = $db2 -> prepare($query13);
        $result13 -> bindParam(":persona_id", $persona_id_3);
        $result13 -> bindParam(":vuelo_id", $reserva_id);
        $result13 -> bindParam(":clase", $clase_2);
        $result13 -> bindParam(":comida_y_maleta", $comida_y_maleta_3);
        $result13 -> execute();
        $data13 = $result13 -> fetchAll();

?>