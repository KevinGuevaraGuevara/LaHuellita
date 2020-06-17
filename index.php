<?php
    require("php/inicio.php");
	$inicio2= new inicioSesion;
	//session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
        <link rel="stylesheet" href="css/menu-estilos.css">
        <link rel="stylesheet" type="text/css" href="css/estilos-formularios.css">

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
		
			<div class="col col-lg-12 col-md-8 col-sm-4">
				<div class="bg-form">
                <div class="row justify-content-center">
                <img src="img/logo.png" width="100" height="70" class="d-inline-block align-top " alt="">
                </div>
                <div class="row justify-content-center">
			<h4>
            Inicio de sesion</h4>
                </div>

                
			<hr class="line">
			<form method="POST">
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Usuario</label>
					<input type="text" name="usuario" class="form-control" required>
				</div>
		  </div>
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<label>Contraseña</label>
					<input type="password" name="pass" class="form-control" required>
				</div>
		  </div>
		  
		  <div class="row mt-4 justify-content-center">
				<div class="col-6">
					<input type="submit" name="Entrar" class="btn btn-forms" value="Entrar">
					<a href="Registro.php">
					<input type="button" name="Registrar" class="btn btn-forms" value="Registrar">
					</a>
				</div>
		  
		</form>
	</div>
		</div>

<?php
if(isset($_POST["Entrar"])){
	$inicio2->setUser($_POST["usuario"]);
	$inicio2->setPass($_POST["pass"]);
	$inicio2->Consulta();
}

?>
	<!-- jQuery CDN -->
  <script type="text/javascript" src="js/jquery-3.3.1.js"></script>

</body>
</html>

