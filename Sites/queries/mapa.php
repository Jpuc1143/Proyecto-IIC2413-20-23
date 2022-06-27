<?php
function mostrar_mapa($vuelos) {
	require("./queries/connection.php");
	STATIC $loaded = 0;
	$api_key = file_get_contents("./.google.key");

	$query_aeropuertos = "SELECT id, latitud, longitud FROM aerodromo";
	$result = $db_impar -> prepare($query_aeropuertos);
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
	console.log(maps);
	for (let i = 0; i<maps.length; i++) {
		console.log(maps[i]);
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
    		zoom: 3,
	});

	let aeropuertos = $aeropuertos_json;
	console.log(aeropuertos);
	for (let key in aeropuertos ) {
		coord = {lat: parseFloat(aeropuertos[key]["latitud"]), lng: parseFloat(aeropuertos[key]["longitud"])}
		new google.maps.Marker({position: coord, map: map$loaded});
	}

	let vuelos = $vuelos_json;
	console.log(vuelos);
	for (let i = 0; i<vuelos.length; i++) {
		startCoord = {lat: parseFloat(aeropuertos[vuelos[i]["aerodromo_salida_id"]]["latitud"]), 
			lng: parseFloat(aeropuertos[vuelos[i]["aerodromo_salida_id"]]["longitud"])};
		endCoord = {lat: parseFloat(aeropuertos[vuelos[i]["aerodromo_llegada_id"]]["latitud"]), 
			lng: parseFloat(aeropuertos[vuelos[i]["aerodromo_llegada_id"]]["longitud"])};
		console.log([startCoord, endCoord]);
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

