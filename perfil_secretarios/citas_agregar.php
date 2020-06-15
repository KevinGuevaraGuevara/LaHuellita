<?php
	//require("../menu.php");
	require("../php/citas.php");
	//require("../php/conexion.php");
	if(!$_SESSION["Priviliegios"]){
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
				require("../menu.php");
			break;
		}
  }
	$citas= new Citas();
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Agregar Citas</title>
	    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../font-awesome/css/all.css">
        <link rel="stylesheet" href="../css/menu-estilos.css">
        <link rel="stylesheet" type="text/css" href="../css/estilos-formularios.css">

        <style type="text/css">
        	/*Form clientes*/

            .bg-form{
	          background-color:  rgb(209,209,208);
	          padding: 10px;
	          width: 50%;
	          height: 100%;
	          margin-left: 250px;
             }

        </style>
</head>
<body>
	<div class="container shadow p-3 mb-5 bg-white rounded">
		<div class="row">
			<div class="col col-lg-12 col-md-8 col-sm-4">
				<div class="bg-form">
			<h4><i class="far fa-clock"></i>Programar nueva cita</h4>
			<hr class="line">
			<form method="POST">
		
			<div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Nombre de veterinario</label>
					<?php
					
					$doctores=$citas->selectDoctores();
					echo "<select class='form-control' name='doctor'>";
					//$doctor=$doctores->fetch_assoc();
					while($doctor=$doctores->fetch_assoc()){
						echo "<option value='$doctor[DUI]'>$doctor[Nombre_Empleado]</option>";
						//$doctor=$doctores->fetch_assoc();
						//echo "$doctor[Nombre]";
					}
					echo "</select>";
					?>
					
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Hora</label>
					<input type="time" name="hora" class="form-control">
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Fechas</label>
					<input type="date" name="fecha" class="form-control">
				</div>
		  </div>
		   <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Paciente</label>
					<?php
					
					$pacientes=$citas->selectPacientes();
					echo "<select class='form-control' name='paciente'>";
					//$doctor=$doctores->fetch_assoc();
					while($paciente=$pacientes->fetch_assoc()){
						//$p=$paciente['Nombre_Cliente']." ".$paciente['Apelido_Cliente'];
						echo "<option value='$paciente[Id_mascota]'>$paciente[Nombre]|$paciente[Nombre_Cliente] $paciente[Apelido_Cliente]</option>";
						//$doctor=$doctores->fetch_assoc();
						//echo "$doctor[Nombre]";
					}
					echo "</select>";
					?>
					
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<input type="submit" name="enviarDatosCita" class="btn btn-forms" value="Registrar">
					<input type="reset" name="cancelar" class="btn btn-forms" value="Limpiar">
				</div>
		  </div>
		</form>
	</div>
</div>
</div>
				
	</div>
	<?php
	if(isset($_POST["enviarDatosCita"])){
		//echo $_POST["fecha"];

		$citas->setPaciente($_POST["paciente"]);
		$citas->setFecha($_POST["fecha"]);
		$citas->setDoctor($_POST["doctor"]);
		$citas->setHora($_POST["hora"]);
		$citas->setEstado(null);
		$citas->setDetalles("");
		$citas->insert();
	
	}
	?>

	<!-- jQuery CDN -->
  <script type="text/javascript" src="js/jquery-3.3.1.js"></script>

</body>
</html>

