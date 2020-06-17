<?php
require ("mascotas.php");

$mascotas= new Mascotas();
$nombre=$_GET["dato"];
$salida="<table class='table table-striped'>
				
		<tr>
	    <th>Id paciente</th>
		<th>Nombre</th>
		<th>Fecha de nacimiento</th>
		<th>Raza</th>
		<th>Dueño</th>
		<th>Sexo</th>
		<th>Modificar</th>
		</tr>
	</tr>
		<tr>";
					
		$mascota=$mascotas->select($nombre);
		if (!$mascota==null) {
			
			while($m=$mascota->fetch_assoc()){
				$salida.= "<tr>";
				$salida.= "<td>$m[Id_mascota]</td>
				<td>$m[Nombre]</td>
				
				<td>$m[Fecha_nacimiento]</td>
				<td>$m[Raza]</td>
				<td>$m[Nombre_Cliente]</td>
				<td>$m[sexo]</td>";
				$salida.= "<td><button type='submit' class='btn btn-forms' value='$m[Id_mascota]' name='mascota'><i class='far fa-edit'></i>Editar</button></td>
				</tr>";
			}
		}
                    
		
		echo $salida.="</tr>";
   
				
?>