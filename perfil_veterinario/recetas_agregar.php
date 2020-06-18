<?php
    require ("../php/recetas.php");
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

    $recet=new Receta();
?>
<!DOCTYPE html>
<html>
    <head>
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
        <title>Extender nueva receta</title>
    </head>
    <body>
    <div class="container shadow p-3 mb-5 bg-white rounded">
		<div class="row">
			<div class="col col-lg-12 col-md-8 col-sm-4">
			<div class="bg-form">
			<h4><i class="fas fa-dog"></i>Extender nueva receta</h4>
			<hr class="line">
			<form method="POST">
			<div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Seleccione una mascota</label>
					<?php
					
					$nombres=$recet->selectPaciente();
			 		
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
					<label>Recetar medicamento</label>
					<?php
					
					$medicamento=$recet->selectMedicamento();
			 		
					echo "<select class='form-control' name='medicamento'>";
					
					while($nombre=$medicamento->fetch_assoc()){
						echo "<option value='$nombre[Id_Medicamento]'>$nombre[Nombre]</option>";
						
					}
					echo "</select>";
					?>
				</div>
		  </div>
          <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Cantidad</label>
					<input type="text" name="cantidad" class="form-control" required>
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Seleccione el estado de la receta</label>
					<?php
					
					$estado=$recet->selectEstado();
			 		
					echo "<select class='form-control' name='estadoReceta'>";
					
					while($nombre=$estado->fetch_assoc()){
						echo "<option value='$nombre[Id_Estado]'>$nombre[Estado_receta]</option>";
						
					}
					echo "</select>";
					?>
				</div>
		  </div>
          
		  
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<input type="submit" name="enviarDatosReceta" class="btn btn-forms" value="Registrar">
					<input type="reset" name="cancelar" class="btn btn-forms" value="Limpiar">
				</div>
		  </div>
		 
			
		</form>
	</div>
</div>
</div>

		
		
	</div>
	<?php
	if(isset($_POST["enviarDatosReceta"])){
		
        
        $recet->setPaciente($_POST["paciente"]);
        $recet->setMedicamento($_POST["medicamento"]);
        $recet->setCantidad($_POST["cantidad"]);
        $recet->setEstado($_POST["estadoReceta"]);
        $recet->insertReceta();

	}
	?>



	<!-- jQuery CDN -->
  <script type="text/javascript" src="js/jquery-3.3.1.js"></script>

    </body>
</html>