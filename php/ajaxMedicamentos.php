<?php
require ("Medicamentos.php");

    $medicina=new Medicamentos;
    $nombre=$_GET["dato"];
    $salida="<table class='table table-stripe'>
    <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>Detalles</th>
    <th>Minimo permitido</th>
    <th>Existencias</th>
    <th>Agregar unidades</th>
    
        </tr>
        <tr>";
           
        $med=$medicina->select($nombre);
        
        if (!$med==null) {
            
               while($m=$med->fetch_assoc()){
                $x=$medicina->stock($m['Id_Medicamento']);
                $salida.= "<tr>";
                $salida.= "<td>$m[Id_Medicamento]</td>
                <td>$m[Nombre]</td>
                <td>$m[Detalles]</td>
                <td>$m[Minimo_Stock]</td>
                <td>$x unidades</td>
                <td><input type=number class=form-control name=$m[Id_Medicamento]></td>";
                $salida.= "<td><button type='submit' class='btn btn-success' value='$m[Id_Medicamento]' name='agregar' onclick=cargarDatos() ><i class='far fa-edit'></i>Agregar</button></td>
				</tr>";
            }
        }
                
        echo $salida.="</tr>";
?>