<!DOCTYPE html>
<html>
<body>
<?php
require("./config/databaseconnect.php");

$vuelo = $_POST['vuelo'];
$p1 = $_POST['pasaporte_1'];
$p2 = $_POST['pasaporte_2'];
$p3 = $_POST['pasaporte_3'];

$query4 = "SELECT *
            FROM vuelo
            WHERE vuelo_id = $vuelo
            ;";
$result4 = $db -> prepare($query4);
$result4 -> execute();
$data4 = $result4 -> fetchAll();

$fechasalida = $data4[0]['fecha_salida'];
$fechallegada = $data4[0]['fecha_llegada'];

if ($p1 == "Código de Pasaporte" && $p2 == "Código de Pasaporte" && $p3 == "Código de Pasaporte"){
    echo "No se ingresaron pasaportes";}
else{
    $query = "SELECT pasaporte
        FROM persona
        WHERE pasaporte = $p1
        ;";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $data = $result -> fetchAll();

    $query2 = "SELECT pasaporte
        FROM persona
        WHERE pasaporte = $p2
        ;";
    $result2 = $db2 -> prepare($query2);
    $result2 -> execute();
    $data2 = $result2 -> fetchAll();

    $query3 = "SELECT pasaporte
            FROM persona
            WHERE pasaporte = $p3
            ;";
    $result3 = $db2 -> prepare($query3);
    $result3 -> execute();
    $data3 = $result3 -> fetchAll();
    if (!$data || !$data2 ||!$data3){
        echo "Se ingresaron pasaportes no válidos";
    }
    else{
        $query5 = "SELECT ticket.reserva_id
        FROM vuelo, persona, cliente, ticket, reserva
        WHERE vuelo.fecha_salida = $fechasalida
        AND vuelo.fecha_llegada  = $fechallegada
        AND persona.pasaporte = $p1
        AND persona.id = cliente.persona_id
        AND persona.id = ticket.persona_id 
        AND reserva.id = ticket.reserva_id
        AND ticket.vuelo_id = vuelo.id
        AND cliente.id = reserva.cliente.id
        ;";
        $result5 = $db2 -> prepare($query5);
        $result5 -> execute();
        $data5 = $result5 -> fetchAll();

        $query6 = "SELECT ticket.reserva_id
        FROM vuelo, persona, cliente, ticket, reserva
        WHERE vuelo.fecha_salida = $fechasalida
        AND vuelo.fecha_llegada  = $fechallegada
        AND persona.pasaporte = $p2
        AND persona.id = cliente.persona_id
        AND persona.id = ticket.persona_id 
        AND reserva.id = ticket.reserva_id
        AND ticket.vuelo_id = vuelo.id
        AND cliente.id = reserva.cliente.id
        ;";
        $result6 = $db2 -> prepare($query6);
        $result6 -> execute();
        $data6 = $result6 -> fetchAll();

        $query7 = "SELECT ticket.reserva_id
        FROM vuelo, persona, cliente, ticket, reserva
        WHERE vuelo.fecha_salida = $fechasalida
        AND vuelo.fecha_llegada  = $fechallegada
        AND persona.pasaporte = $p3
        AND persona.id = cliente.persona_id
        AND persona.id = ticket.persona_id 
        AND reserva.id = ticket.reserva_id
        AND ticket.vuelo_id = vuelo.id
        AND cliente.id = reserva.cliente.id
        ;";
        $result7 = $db2 -> prepare($query7);
        $result7 -> execute();
        $data7 = $result7 -> fetchAll();
        
        if(!$data5 && !$data6 && !$data7 ){
            #actualizar base con procedimiento almacenado
        }
        else{
            echo "Existen pasajeros que poseen vuelos para la fecha indicada";
        }
    }
}

?>
</body>
</html>