<?php
	
	require ("../php/inicio.php");
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
    $empleados= new inicioSesion;
    $empleado = $_POST["emp"];
    $datos = $empleados->selectE($empleado)->fetch_assoc();
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
			<h4><i class="far fa-clock"></i>Modificar datos de empleado</h4>
			<hr class="line">
			<form method="POST" action="empleados_index.php">
		  
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Privilegio</label>
					<?php
				
					$rol=$empleados->privilegios();
					echo "<select class='form-control' name='priv'>";
					
					while($emp=$rol->fetch_assoc()){
						if($datos['Priviliegios']==$emp['Id_Privilegios']){
							echo "<option selected value='$emp[Id_Privilegios]'>$emp[Usuario]</option>";
						}else{

							echo "<option value='$emp[Id_Privilegios]'>$emp[Usuario]</option>";
						}
					}
					echo "</select>";
					?>
				
					
				</div>
		  </div>
          <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Nombre de empleado</label>
					<input type="text" name="Nombre" class="form-control" value='<?php echo $datos["Nombre_Empleado"]?>'>
				</div>
		  </div>
          <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Apellido</label>
					<input type="text" name="Apellido" class="form-control" value='<?php echo $datos["Apellido"]?>'>
				</div>
		  </div>
          <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>DUI</label>
					<input type="text" name="DUI" class="form-control" value='<?php echo $datos["DUI"]?>'>
				</div>
		  </div>
          <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Usuario</label>
					<input type="text" name="Usuario" class="form-control" value='<?php echo $datos["usuario"]?>'>
				</div>
		  </div>
          <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Contraseña</label>
					<input type="password" name="contrasenia" class="form-control" >
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
				<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="activo">
    <label class="form-check-label" for="exampleCheck1">Empleado activo</label>
  </div>
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<input type="submit" name="Registrar" class="btn btn-forms" value="Modificar">
					<input type="reset" name="cancelar" class="btn btn-forms" value="Limpiar">
				</div>
		  </div>
		  <input type="text" name="id" class="invisible" value='<?php echo $empleado?>'>
		</form>
	</div>
</div>
</div>			
	</div>
    
	<!-- jQuery CDN -->
  <script type="text/javascript" src="js/jquery-3.3.1.js"></script>

</body>
</html>