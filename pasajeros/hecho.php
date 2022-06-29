<?php
require("./config/databaseconnect.php");
print_r($_POST);
$codigo_vuelo = $_POST['codigo_vuelo'];

#Crea codigo de reserva
$query4 = " SELECT id FROM reserva ORDER BY id DESC;";
$result4 = $db2 -> prepare($query4);
$result4 -> execute();
$data4 = $result4 -> fetchAll();

$reserva_id = $data4[0][0];

#Encuentra id de vuelo
$query2 = "SELECT id
        FROM vuelo
        WHERE codigo = :codigo_vuelo 
        ;";
$result2 = $db2 -> prepare($query2);
$result2 -> bindParam(":codigo_vuelo", $codigo_vuelo);
$result2 -> execute();
$data2 = $result2 -> fetchAll();

$vuelo_id = intval($data2[0][0]) +1 ;

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

#Encuentra ticket mas alto y crea uno nuevo después de ese
$query3 = "SELECT numero FROM ticket ORDER BY numero DESC;";
$result3 = $db2 -> prepare($query3);
$result3 -> execute();
$data3 = $result3 -> fetchAll();

$numero_1 = intval($data3[0][0]) + 1;

#Encuentra numero de asiento mas alto y crea uno nuevo luego de ese
$query5 = "SELECT numero_asiento FROM ticket WHERE vuelo_id = :vuelo_id ORDER BY numero DESC 
        ;";
$result5 = $db2 -> prepare($query5);
$result5 -> bindParam(":vuelo_id", $vuelo_id);
$result5 -> execute();
$data5 = $result5 -> fetchAll();

$numero_asiento_1 = intval($data5[0][0]) + 1;

$query8 = "SELECT insertar_reserva(:reserva_id, :cliente_id, :codigo);";
$result8 = $db2 -> prepare($query8);
$result8 -> bindParam(":reserva_id", $vuelo_id);
$result8 -> bindParam(":cliente_id", $persona_id_1);
$result8 -> bindParam(":codigo", $reserva_id);
$result8 -> execute();
$data8 = $result8 -> fetchAll();

if (count($_POST) > 4){
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

    #Encuentra ticket mas alto y crea uno nuevo después de ese
    $numero_2 = intval($data3[0][0]) + 2;

    #Encuentra numero de asiento mas alto y crea uno nuevo luego de ese
    $numero_asiento_2 = intval($data5[0][0]) + 2;

    if(count($_POST) > 7){
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
    
    #Encuentra ticket mas alto y crea uno nuevo después de ese
    $numero_3 = intval($data3[0][0]) + 2;

    #Encuentra numero de asiento mas alto y crea uno nuevo luego de ese
    $numero_asiento_3 = intval($data5[0][0]) + 2;

    }
}

?>