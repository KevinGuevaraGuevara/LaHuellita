<?php
	
	require("../php/recetas.php");
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
	$recetas= new Receta();
	$receta=$_POST["receta"];
	$datos=$recetas->select($receta)->fetch_assoc();
	
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
			<h4><i class="far fa-clock"></i>Modificar datos de la receta/h4>
			<hr class="line">
			<form method="POST" action="recetas_index.php">
		

			
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Paciente</label>
					<?php
					
					$pacientes=$receta->selectPaciente();
					echo "<select class='form-control' name='pacientes'>";
					
					while($paciente=$pacientes->fetch_assoc()){
						if($datos['Id_mascota']==$paciente['Id_mascota']){
							echo "<option selected value='$paciente[Id_mascota]'>$paciente[Mascota]</option>";
						}else{

							echo "<option value='$paciente[Id_mascota]'>$paciente[Mascota]</option>";
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
					
					$estados=$recetas->selectEstado();
					echo "<select class='form-control' name='sexo'>";

					while($estado=$estados->fetch_assoc()){
						if($datos['sexo']==$estado['estado']){
							echo "<option selected value='$estado[Id_Estado]'>$estado[Estado]</option>";
						}else{
							echo "<option value='$estado[Id_Estado]'>$estado[Estado]</option>";
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
					
					$medicamentos=$recetas->selectMedicamento();
					echo "<select class='form-control' name='medicamento'>";
					
					while($medicamento=$medicamentos->fetch_assoc()){
						if($datos['Id_cliente']==$medicamento['Id_Cliente']){
							echo "<option selected value='$medicamento[Id_Medicamento]'>$medicamento[Medicamento]</option>";
						}else{

							echo "<option value='$medicamento[Id_Medicamento]'>$medicamento[Medicamento]</option>";
						}
					}
					echo "</select>";
					?>
				
					
				</div>
		  </div>
          <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Cantidad</label>
					<input type="number" name="cantidad" class="form-control" value='<?php echo $datos["Cantidad"]?>'>
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<input type="submit" name="enviarDatosMascota" class="btn btn-forms" value="Modificar">
					<input type="reset" name="cancelar" class="btn btn-forms" value="Limpiar">
				</div>
		  </div>
		  <input type="text" name="id" class="invisible" value='<?php echo $receta?>'>
		</form>
	</div>
</div>
</div>			
	</div>
    
	<!-- jQuery CDN -->
  <script type="text/javascript" src="js/jquery-3.3.1.js"></script>

</body>
</html>