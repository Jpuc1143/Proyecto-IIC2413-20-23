<?php include("header.html") ?>

<h2>Importar Usuarios</h2>
<form method="post">
	<input type="hidden" name="importar" value="1">
	<input type="submit" value="Empezar">
</form>


<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ($_POST["importar"] === "1") {
		// TODO importar	
		require("./queries/importar.php");
	}
	// TODO: _POST login etc
}

?>

<?php include("footer.html") ?>
