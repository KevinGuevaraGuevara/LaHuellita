<?php
	
	require ("../php/citas.php");
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
    $cita = $_POST["editCita"]
    $datos = $citas->select($cita)->fetch_assoc();
	//$receta=$_POST["receta"];
	//$datos=$recetas->select($receta)->fetch_assoc();
	
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
			<h4><i class="far fa-clock"></i>Modificar datos de la cita</h4>
			<hr class="line">
			<form method="POST" action="citas_index.php">
		  
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Veterinario</label>
					<?php
					
					$vet=$citas->selectDoctores();
					echo "<select class='form-control' name='doc'>";
					
					while($emp=$vet->fetch_assoc()){
						if($datos['DUI']==$emp['DUI']){
							echo "<option selected value='$emp[DUI]'>$emp[Nombre_Empleado]</option>";
						}else{

							echo "<option value='$emp[DUI]'>$emp[Nombre_Empleado]</option>";
						}
					}
					echo "</select>";
					?>
				
					
				</div>
		  </div>
          <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Paciente</label>
					<?php
					
					$paciente=$citas->selectPacientes();
					echo "<select class='form-control' name='paciente'>";
					
					while($pac=$vet->fetch_assoc()){
						if($datos['Id_mascota']==$pac['Id_mascota']){
							echo "<option selected value='$pac[Id_mascota]'>$pac[Nombre]</option>";
						}else{

							echo "<option value='$pac[Id_mascota]'>$pac[Nombre]</option>";
						}
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
					<input type="submit" name="Registrar" class="btn btn-forms" value="Modificar">
					<input type="reset" name="cancelar" class="btn btn-forms" value="Limpiar">
				</div>
		  </div>
		  <input type="text" name="id" class="invisible" value='<?php echo $empEdit?>'>
		</form>
	</div>
</div>
</div>			
	</div>
    
	<!-- jQuery CDN -->
  <script type="text/javascript" src="js/jquery-3.3.1.js"></script>

</body>
</html>