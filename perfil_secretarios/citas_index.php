<?php
	
	require("../php/citas.php");
	if(!$_SESSION["Priviliegios"]){
        header("location:../index.php");
    }else{

		switch($_SESSION["Priviliegios"]){
			case 1:
				require("../menu_admin.php");
			break;
			case 2:
				require("../menu_veterinario.php");
			break;
			case 3:
				require("../menu.php");
			break;
		}
  }
	$citas= new Citas();
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro de Citas</title>
	    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../font-awesome/css/all.css">
        <link rel="stylesheet" href="../css/menu-estilos.css">
        <link rel="stylesheet" type="text/css" href="../css/estilos-formularios.css">
		<link rel="stylesheet" type="text/css" href="../css/estilos-formularios.css">
		
		
		</head>
<body onload="cargarDatos()">

	<div class="container shadow p-3 mb-5 bg-white rounded">
		
		
		<div class="row justify-content-end">
			<div class="col-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<a href="citas_agregar.php"><button type="button" class="btn btn-agg" name="agregarCliente"><i class="fas fa-plus"></i>Programar nueva cita</button></a>
			</div>
		</div>
		<hr class="line">
		<div class="row">
			<div class="col-4">
						<form>
		     <label>Buscar citas por fecha</label>
             <input class="form-control mr-sm-2" type="date" value="<?php
		$fecha= date("Y")."-";
		$fecha.= date("m")."-";
		$fecha.= date("d");
		echo $fecha;?>" placeholder="Búsqueda por fecha" aria-label="Search" name="fecha" id="fecha" onload="cargarDatos()">
                <button type="button" class="btn btn-forms my-2 my-sm-0" onclick="cargarDatos()" name="buscar"><i class="fas fa-search"></i>Buscar</button>
						</form>	
          
			</div>
			
		</div>
		<div class="row justify-content-center">
			<div class="col-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<h4 class="title-page">Registro de citas</h4>
			</div>
		</div>
		<form action="citas_agregar.php">
		<div class="table-responsive">
			<div id="respuesta"></div>
		</div>
		</form>
		</div>
		
	</div>
	

</body>
<script>
function cargarDatos() {
	var dato=document.getElementById("fecha").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("respuesta").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", `../php/ajaxcitas.php?dato=${dato}`,true);
	xhttp.send();
}
</script>

</html>