<?php
require ("citas.php");

$citas= new Citas();

if(isset($_GET["dato"])){
	$fecha=$_GET["dato"];
	$cita=$citas->selectporfecha($fecha);

	$respuesta="
	<table class='table table-striped'>
	<tr>
	<th>Id cita</th>
	<th>Veterinario</th>
	<th>Hora</th>
	<th>Fecha</th>
	<th>Paciente</th>
	<th>Estado</th>
	
	</tr>";
	if(!$cita==null){

		while($c=$cita->fetch_assoc()){
			$respuesta.= "<tr>";
			$respuesta.="<td>$c[Id_Cita]</td>
			<td>$c[Nombre_Empleado]</td>
			<td>$c[Hora]</td>
			<td>$c[Fecha]</td>
			<td>$c[Nombre]</td>
			<td>$c[Estado]</td>";
			
			//"<td><button type='submit' class='btn btn-forms' value='$c[Id_Cita]' name='editCita'><i class='far fa-edit'></i>Editar</button></td>
			$respuesta.= 
				"</tr>";
		}
	}
    echo $respuesta.="</table>";
}
				
?>