<?php
	require("../menu.php");
	require("../php/inicio.php");
	
	$empleado = new inicioSesion();
	if(isset($_POST["Registrar"])){
		$empleados->setUser($user);
		$empleados->setPass($pass);
		$empleados->setDUI($DUI);
		$empleados->setNombre($Nombre);
		$empleados->setPrivilegios($privilegios);
		$empleados->setApellido($apellido);
		$empleados->ediatrEmpleado($usuario);
	}
	
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
	xhttp.open("GET", `../php/ajaxEmpleados.php?dato=${dato}`,true);
	xhttp.send();
}
</script>
</html>