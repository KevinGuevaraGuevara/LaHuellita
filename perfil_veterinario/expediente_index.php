<?php
	require("../menu_veterinario.php");
	require("../php/veterinario.php");
	
	$expedientes= new Expediente();
	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../font-awesome/css/all.css">
        <link rel="stylesheet" href="../css/menu-estilos.css">
        <link rel="stylesheet" type="text/css" href="../css/estilos-formularios.css">
</head>
<body onload="cargarDatos()">

	<div class="container shadow p-3 mb-5 bg-white rounded">
		
		
		<div class="row justify-content-between">
		<div class="col-5 col-lg-5 col-md-6 col-sm-12 col-xs-12">
		
		<input type="text" class="form-control col-5 align-content-start mt-4" placeholder="Buscar por nombre" id="nombre" name="nombre" onkeyup="cargarDatos()">
			</div>
		<div class="col-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<a href="expendiente_agregar.php"><button type="button" class="btn btn-agg" name="agregarExpe"><i class="fas fa-plus"></i>Agregar nuevo expediente</button></a>
			</div>
		</div>

		
	
			
		
		<hr class="line">
		<div class="row justify-content-center">
			<div class="col-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<h4 class="title-page">Expedientes medicos</h4>
			</div>
		</div>
		<div class="table-responsive">
			<div id="respuesta"></div>
		</div>
		</div>
	</div>

</body>
<script>
function cargarDatos() {
	var dato=document.getElementById("nombre").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("respuesta").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", `../php/ajaxExpediente.php?dato=${dato}`,true);
	xhttp.send();
}
</script>
</html>