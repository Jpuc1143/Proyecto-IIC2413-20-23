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
            WHERE vuelo_id = :vuelo
            ;";
$result4 = $db -> prepare($query4);
$result4 -> bindParam(":vuelo",$vuelo);
$result4 -> execute();
$data4 = $result4 -> fetchAll();

print_r($data4);

$fechasalida = $data4[0]['fecha_salida'];
$fechallegada = $data4[0]['fecha_llegada'];
$codigo_vuelo = $data4[0]['codigo'];

if ($p1 == "Código de Pasaporte" && $p2 == "Código de Pasaporte" && $p3 == "Código de Pasaporte"){
    echo "No se ingresaron pasaportes";}
else{
    $query = "SELECT pasaporte
        FROM persona
        WHERE pasaporte = '$p1'
        ;";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $data = $result -> fetchAll();

    $query2 = "SELECT pasaporte
        FROM persona
        WHERE pasaporte = '$p2'
        ;";
    $result2 = $db2 -> prepare($query2);
    $result2 -> execute();
    $data2 = $result2 -> fetchAll();

    $query3 = "SELECT pasaporte
            FROM persona
            WHERE pasaporte = '$p3'
            ;";
    $result3 = $db2 -> prepare($query3);
    $result3 -> execute();
    $data3 = $result3 -> fetchAll();

    if (!$data && $p1 != 'Código de Pasaporte'){
        echo "El pasaporte $p1 no es válido";
    }
    if (!$data2 && $p2 != 'Código de Pasaporte'){
        echo "El pasaporte $p2 no es válido";
    }
    if (!$data3 && $p3 != 'Código de Pasaporte'){
        echo "El pasaporte $p3 no es válido";
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
            echo "<form action='hecho.php' method='post'>";
            if (!$data5 && $p1 != 'Código de Pasaporte'){
            echo "
            <div>Seleccione Clase <select name='clase_1' id='clase_1'>
            <option value='0'> Primera clase </option>
            <option value='1'> Ejecutiva </option>
            <option value='2'> Economica </option>
            </select></div>
            <div>¿Desea agregar comida y maleta?<select name='agregar_1' id='agregar_1'>
            <option value='0'> Si </option>
            <option value='1'> No </option>
            </select></div>  
            <div><input type='hidden' name='pasaporte_1' value=$p1 /> 
            ";}
            if (!$data6 && $p2 != 'Código de Pasaporte'){
                echo "
                <div>Seleccione Clase <select name='clase_2' id='clase_2'>
            <option value='0'> Primera clase </option>
            <option value='1'> Ejecutiva </option>
            <option value='2'> Economica </option>
            </select></div>
            <div>¿Desea agregar comida y maleta?<select name='agregar_2' id='agregar_2'>
            <option value='0'> Si </option>
            <option value='1'> No </option>
            </select></div>  
            <div><input type='hidden' name='pasaporte_2' value=$p2 /> 
                ";}
            if (!$data7 && $p3 != 'Código de Pasaporte'){
            echo "
            <div>Seleccione Clase <select name='clase_3' id='clase_3'>
            <option value='0'> Primera clase </option>
            <option value='1'> Ejecutiva </option>
            <option value='2'> Economica </option>
            </select></div>
            <div>¿Desea agregar comida y maleta?<select name='agregar_3' id='agregar_3'>
            <option value='0'> Si </option>
            <option value='1'> No </option>
            </select></div>  
            <div><input type='hidden' name='pasaporte_3' value=$p3 /> 
            ";}
            echo 
            "<div><input type='hidden' name='codigo_vuelo' value=$codigo_vuelo />
            <div><button type='submit' value='Reservar'> Reservar </div>
            ";

        }
        else{
            echo "Existen pasajeros que poseen vuelos para la fecha indicada";
        }
    }
}

?>
</body>
</html>