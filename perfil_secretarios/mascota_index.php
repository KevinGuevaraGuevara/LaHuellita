<?php
	require("../menu.php");
	require("../php/mascotas.php");
	
	$mascotas= new Mascotas();
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registro de mascotas</title>
	    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../font-awesome/css/all.css">
        <link rel="stylesheet" href="../css/menu-estilos.css">
        <link rel="stylesheet" type="text/css" href="../css/estilos-formularios.css">
</head>
<body onload="cargarDatos()">

	<div class="container shadow p-3 mb-5 bg-white rounded">
		<form action="modificar_mascotas.php" method="POST">
		<div class="row justify-content-start">
		<div class="col-4 align-content-start mt-4">
		<label for="busqueda">Buscar:</label>
		<input type="text" class="form-control" id="busqueda" placeholder="Nombre" onkeyup="cargarDatos()">
		</div>
			<div class="col-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<a href="mascota_agregar.php"><button type="button" class="btn btn-agg" name="agregarCliente"><i class="fas fa-plus"></i>Agregar nuevo paciente</button></a>
			</div>
		</div>
		<hr class="line">
		<div class="row justify-content-center">
			<div class="col-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<h4 class="title-page">Registro de pacientes</h4>
			</div>
		</div>
		<div class="table-responsive">
			<div id="respuesta"></div>
		</div>
		</div>
		</form>
	</div>

</body>
<script>
function cargarDatos() {
	var dato=document.getElementById("busqueda").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("respuesta").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", `../php/ajaxMascotas.php?dato=${dato}`,true);
	xhttp.send();
}
</script>
</html>