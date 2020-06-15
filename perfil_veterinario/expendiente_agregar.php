<?php
	
	require("../php/veterinario.php");
	if(!$_SESSION["Priviliegios"]){
        header("location:../index.php");
    }else{

		switch($_SESSION["Priviliegios"]){
			case 1:
				require("../menu_admin.php");
			break;
			case 2:
				rrequire("../menu_veterinario.php");
			break;
			case 3:
				require("../menu.php");
			break;
		}
  }

	$expedientes= new Expediente();
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Agregar expediente médico</title>
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
			<h4><i class="fas fa-dog"></i>Registrar nuevo expediente</h4>
			<hr class="line">
			<form method="POST">
			<div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Seleccione una mascota</label>
					<?php
					
					$nombres=$expedientes->selectNombre();
			 		
					echo "<select class='form-control' name='paciente'>";
					
					while($nombre=$nombres->fetch_assoc()){
						echo "<option value='$nombre[Id_mascota]'>$nombre[Nombre]</option>";
						
					}
					echo "</select>";
					?>
				</div>
		  </div>
           
			<div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Observaciones</label>
					<input type="text" name="observaciones" class="form-control">
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Sintomas</label>
					<input type="text" name="sintomas" class="form-control" required>
				</div>
		  </div>
          <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Vacunas</label>
					<input type="text" name="vacunas" class="form-control" required>
				</div>
		  </div>
          <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Medicamentos consumidos previamente</label>
					<input type="text" name="consumir" class="form-control" required>
				</div>
		  </div>
		  
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<input type="submit" name="enviarDatosExpediente" class="btn btn-forms" value="Registrar">
					<input type="reset" name="cancelar" class="btn btn-forms" value="Limpiar">
				</div>
		  </div>
		 
			
		</form>
	</div>
</div>
</div>

		
		
	</div>
	<?php
	if(isset($_POST["enviarDatosExpediente"])){
		//echo $_POST["fecha"];

		/*$mascotas->setNombre($_POST["nombre"]);
		$mascotas->setFechanacimiento($_POST["fecha"]);
		$mascotas->setRaza($_POST["raza"]);
		$mascotas->setDueño($_POST["dueño"]);
		$mascotas->setSexo($_POST["sexo"]);
        $mascotas->insert();*/
        
        $expedientes->setNomascota($_POST["paciente"]);
        $expedientes->setObservaciones($_POST["observaciones"]);
        $expedientes->setSintomas($_POST["sintomas"]);
        $expedientes->setVacuna($_POST["vacunas"]);
        $expedientes->setConsume($_POST["consumir"]);
        $expedientes->insert();

	}
	?>



	<!-- jQuery CDN -->
  <script type="text/javascript" src="js/jquery-3.3.1.js"></script>

</body>
</html>