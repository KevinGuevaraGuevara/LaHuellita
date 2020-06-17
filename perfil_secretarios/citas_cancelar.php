<?php
	
	require("../php/citas.php");
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
	$citas= new Citas();
	
?>
	<table class="table table-dark" align="center">
		<form method="POST">
			<tr>
			<tr>
				<td><b> ID         </b></td> 
			     <td><b> Paciente </b></td>
			     <td><b> Doctor   </b></td>
			     <td><b> Fecha    </b></td>
			     <td><b> Hora     </b></td>
			     <td><b> Detalles </b></td>
                 <td><b> Estado   </b></td>
                 <td><b> Elegir cita   </b></td>
             </tr>

               <?php

               $mostrar=mysqli_query($conn,"SELECT citas.id, mascotas.nombre AS mas ,empleados.nombre,empleados.apellido, empleados.apellido, citas.fecha,citas.hora,citas.detalles,citas.estado 
                         FROM citas
                         INNER JOIN mascotas ON citas.paciente =mascotas.id
                         INNER JOIN empleados ON citas.doctor= empleados.id
                          WHERE estado='Activo'");
                          
               while ($i= mysqli_fetch_assoc($mostrar)) {
   
                  echo "<tr>
                           <td>".$i['id']."</td>
                           <td>".$i['mas']."</td>
                           <td>".$i['nombre']." ".$i['apellido']."</td>
		                   <td>".$i['fecha']."</td>
		                   <td>".$i['hora']."</td>
		                   <td>".$i['detalles']."</td>
		                   <td>".$i['estado']."</td>";
                  echo "<td><input type='radio' name='num' value='".$i['id']."' class='form control'></td>
                        </tr>";

                                                         }
                  ?>
			<tr>
              <td><input type="submit" value="Cancelar" name="cancelar" class="btn btn-warning"></td>		
				</tr>
		</form>
	</table>
<?php 
if (isset($_POST['cancelar'])) {
	if (empty($_POST['num'])) {

	         echo "<div class='alert bg-warning' role='alert'><font color='white' >Para cancelar una cita debes elegir una en la tabla<span class='glyphicon glyphicon-search'></span>
 </font></div>";
		
	}else{
		$id=$_POST['num'];
		$mo=mysqli_query($conn,"UPDATE citas SET estado='Cancelada' WHERE id='$id'");

         echo "<div class='alert bg-success' role='alert'><font color='white' > La cita ha sido actualizada con exito</font></div>";


	}
}

 ?>
 