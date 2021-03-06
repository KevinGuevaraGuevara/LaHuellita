<?php
	require ("../php/inicio.php");
	if(!isset($_SESSION["Priviliegios"])){
        header("location:../index.php");
    }else{

		switch($_SESSION["Priviliegios"]){
			case 1:
				require("../menu_admin.php");
			break;
			case 2:
				header("location:../index.php");
			break;
			case 3:
				header("location:../index.php");
			break;
		}
  }
	
	$empleados = new inicioSesion();
	if(isset($_POST["Registrar"])){
		$empleados->setUser($_POST["Usuario"]);
		$empleados->setPass($_POST["contrasenia"]);
		$empleados->setDUI($_POST["DUI"]);
		$empleados->setNombre($_POST["Nombre"]);
		$empleados->setPrivilegios($_POST["priv"]);
		$empleados->setApellido($_POST["Apellido"]);
		if(isset($_POST["activo"])){
			$activo=1;
		}else{
			$activo=2;
		}
		$empleados->editarEmpleado($_POST["id"], $activo);
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Empleados</title>
	    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../font-awesome/css/all.css">
        <link rel="stylesheet" href="../css/menu-estilos.css">
        <link rel="stylesheet" type="text/css" href="../css/estilos-formularios.css">
</head>
<body onload="cargarDatos()">

	<div class="container shadow p-3 mb-5 bg-white rounded">
		<form action="empleados_editar.php" method="POST">
		<div class="row justify-content-start">
		<div class="col-4 align-content-start mt-4">
		<label for="busqueda">Buscar:</label>
		<input type="text" class="form-control" id="busqueda" placeholder="Nombre" onkeyup="cargarDatos()">
		</div>
			<div class="col-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<a href="../Registro.php"><button type="button" class="btn btn-agg" name="agregarCliente"><i class="fas fa-plus"></i>Agregar nuevo empleado</button></a>
			</div>
		</div>
		<hr class="line">
		<div class="row justify-content-center">
			<div class="col-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<h4 class="title-page">Registro de empleados</h4>
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