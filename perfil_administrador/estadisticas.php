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
            require("../menu_veterinario.php");
        break;
        case 3:
            require("../menu.php");
        break;
    }
}
$mascotas=new Mascotas;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Estadisticas de clientes por genero</title>
    
	    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../font-awesome/css/all.css">
        <link rel="stylesheet" href="../css/menu-estilos.css">
        <link rel="stylesheet" type="text/css" href="../css/estilos-formularios.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    
	
</head>
<body>

	<div class="container shadow p-3 mb-5 bg-white rounded">
    <h1>Estadisticas de clientes por genero</h1>
    <div id="graph" style="height: 250px;"></div>
    
	</div>

</body>
<script>
Morris.Donut({
  element: 'graph',
  data: [
    {value: <?php echo $mascotas->graficas()['Machos']*100?>, label: 'Masculino'},
    {value: <?php echo $mascotas->graficas()['Hembras']*100?>, label: 'Femenino'},
   
  ],
  backgroundColor: '#fff',
  labelColor: '#060',
  colors: [
    '#0BA462',
    '#b317c5',
    
  ],
  formatter: function (x) { return x + "%"}
});
</script>
</html>