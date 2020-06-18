<?php
    require ("inicio.php");

    $listEmpleados = new inicioSesion();
    $nombre=$_GET["dato"];
    $salida="<table class='table table-striped'>
             <tr>
             <th>DUI</th>
             <th>Nombre</th>
             <th>Apellido</th>
             <th>Usuario</th>
             <th>Privilegio</th>
             <th>Opciones</th>
             </tr>
             </tr>
             <tr>
             ";
             $listar=$listEmpleados->select($nombre);
             if(!$listar==null){
                 while($e=$listar->fetch_assoc()){
                     $salida.="<tr>";
                     $salida.="<td>$e[DUI]</td>
                     <td>$e[Nombre_Empleado]</td>
                     <td>$e[Apellido]</td>
                     <td>$e[Usuario]</td>
                     <td>$e[pri]</td>
                     ";

                $salida.="<td><button type='button' class='btn btn-forms' values='$e[DUI]' name='empEdit'><i class='far fa-edit'></i>Editar</button>
                </td>
                
                </tr>";
                 }
             }
             echo $salida;
?>