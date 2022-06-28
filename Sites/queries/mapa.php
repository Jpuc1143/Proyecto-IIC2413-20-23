<?php
function mostrarMapa($vuelos, $impar = true) {
	require("./queries/connection.php");
	require("./config/databaseconnect.php");

	STATIC $loaded = 0;
	$api_key = file_get_contents("./.google.key");
	
	if ($impar) {
		$query_aeropuertos = "SELECT id, latitud, longitud FROM aerodromo";
		$result = $db_impar -> prepare($query_aeropuertos);
	} else {
		$query_aeropuertos = "SELECT aerodromo_id as id, latitud, longitud FROM aerodromos JOIN coordenada ON aerodromos.coordenada_id = coordenada.coordenada_id";
		$result = $db -> prepare($query_aeropuertos);
	}

	$result -> execute();
	$aeropuertos_result = $result -> fetchAll(PDO::FETCH_ASSOC);

	$aeropuertos = array();
	foreach($aeropuertos_result as $k => $v) {
		$aeropuertos[$v["id"]] = $v;
	}

	$aeropuertos_json = json_encode($aeropuertos);
	$vuelos_json = json_encode($vuelos);

	if ($loaded == 0) {
		echo '<script async src="https://maps.googleapis.com/maps/api/js?key='.$api_key.'&callback=initMap"></script>';
		echo <<<TEXT
<script>
let maps = [];
function initMap() {
	for (let i = 0; i<maps.length; i++) {
		(maps[i])();
	}
window.initMap = initMap;
}
</script>
TEXT;
	}
	$loaded += 1;
	$html = <<<TEXT
<div class="ratio ratio-21x9" id="map$loaded"></div>
<script>
let map$loaded;

function drawMap$loaded() {
	map$loaded = new google.maps.Map(document.getElementById("map$loaded"), {
		center: { lat: 0, lng: 0 },
    		zoom: 2,
	});

	let aeropuertos = $aeropuertos_json;
	for (let key in aeropuertos ) {
		coord = {lat: parseFloat(aeropuertos[key]["latitud"]), lng: parseFloat(aeropuertos[key]["longitud"])}
		new google.maps.Marker({position: coord, map: map$loaded});
	}

	let vuelos = $vuelos_json;
	for (let i = 0; i<vuelos.length; i++) {
		startCoord = {lat: parseFloat(aeropuertos[vuelos[i]["aerodromo_salida_id"]]["latitud"]), 
			lng: parseFloat(aeropuertos[vuelos[i]["aerodromo_salida_id"]]["longitud"])};
		endCoord = {lat: parseFloat(aeropuertos[vuelos[i]["aerodromo_llegada_id"]]["latitud"]), 
			lng: parseFloat(aeropuertos[vuelos[i]["aerodromo_llegada_id"]]["longitud"])};
		new google.maps.Polyline({
			path: [startCoord, endCoord],
			geodesic: true,
			strokeColor: "#FF0000",
		    	strokeOpacity: 1.00,
    			strokeWeight: 2,
			map: map$loaded
		});
	}
}
maps.push(drawMap$loaded);
</script>
TEXT;

	echo $html;
}
?>

