<?php
	//require("../menu.php");
	require("../php/Medicamentos.php");
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
	$medicina= new Medicamentos();
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Agregar nuevo medicamento</title>
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
					<label for="medicamento">Nombre del medicamento</label>
					<input type="text" id="medicamento" name="medicamento" class="form-control" required>
					
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label for="Detalles">Detalles</label>
					<input type="text" id="Detalles" name="Detalles" class="form-control">
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Minimo en existencias</label>
					<input type="number" name="Minimo" class="form-control" min=0 value=0 required>
				</div>
		  </div>
		  
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<input type="submit" name="enviarDatos" class="btn btn-forms" value="Registrar">
					<input type="reset" name="cancelar" class="btn btn-forms" value="Limpiar">
				</div>
		  </div>
		</form>
	</div>
</div>
</div>
				
	</div>
	<?php
	if(isset($_POST["enviarDatos"])){
		//echo $_POST["fecha"];
		$medicina->insert($_POST["medicamento"],$_POST["Minimo"],$_POST["Detalles"]);
	}
	?>

	<!-- jQuery CDN -->
  <script type="text/javascript" src="js/jquery-3.3.1.js"></script>

</body>
</html>

