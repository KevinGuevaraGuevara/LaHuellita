<?php
	
	require("../php/mascotas.php");
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
	$mascotas= new Mascotas();
	$mascota=$_POST["mascota"];
	$datos=$mascotas->selectM($mascota)->fetch_assoc();
	
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar informacion</title>
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
			<h4><i class="far fa-clock"></i>Modificar datos de la mascota</h4>
			<hr class="line">
			<form method="POST" action="mascota_index.php">
		

			<div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Nombre del paciente</label>
					<input type="text" name="nombre" class="form-control" value='<?php echo $datos["Nombre"]?>'>
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Fecha de nacimiento</label>
					<input type="date" name="fecha" class="form-control" value='<?php echo $datos["Fecha_nacimiento"]?>' required>
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Raza</label>
					<?php
					
					$razas=$mascotas->selectRazas();
					echo "<select class='form-control' name='raza'>";
					
					while($raza=$razas->fetch_assoc()){
						if($datos['Id_raza']==$raza['Id_raza']){
							echo "<option selected value='$raza[Id_raza]'>$raza[Raza]</option>";
						}else{

							echo "<option value='$raza[Id_raza]'>$raza[Raza]</option>";
						}
					}
					echo "</select>";
					?>
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Sexo</label>
					<?php
					
					$sexos=$mascotas->selectSexos();
					echo "<select class='form-control' name='sexo'>";

					while($sexo=$sexos->fetch_assoc()){
						if($datos['sexo']==$sexo['sexo']){
							echo "<option selected value='$sexo[Identificador]'>$sexo[sexo]</option>";
						}else{
							echo "<option value='$sexo[Identificador]'>$sexo[sexo]</option>";
						}
	
					}
					echo "</select>";
					
					?>
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Dueño</label>
					<?php
					
					$dueños=$mascotas->selectDueño();
					echo "<select class='form-control' name='dueño'>";
					
					while($dueño=$dueños->fetch_assoc()){
						if($datos['Id_cliente']==$dueño['Id_Cliente']){
							echo "<option selected value='$dueño[Id_Cliente]'>$dueño[Nombre_Cliente] $dueño[Apelido_Cliente]</option>";
						}else{

							echo "<option value='$dueño[Id_Cliente]'>$dueño[Nombre_Cliente] $dueño[Apelido_Cliente]</option>";
						}
					}
					echo "</select>";
					?>
				
					
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<input type="submit" name="enviarDatosMascota" class="btn btn-forms" value="Modificar">
					<input type="reset" name="cancelar" class="btn btn-forms" value="Limpiar">
				</div>
		  </div>
		  <input type="text" name="id" class="invisible" value='<?php echo $mascota?>'>
		</form>
	</div>
</div>
</div>			
	</div>
    
	<!-- jQuery CDN -->
  <script type="text/javascript" src="js/jquery-3.3.1.js"></script>

</body>
</html>

