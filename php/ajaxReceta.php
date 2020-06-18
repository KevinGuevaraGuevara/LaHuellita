<?php
    require("recetas.php");

    $registros = new Receta();
    $receta=$_GET["dato"];
    $salida="<table class='table table-striped'>
        <tr>
        <th>Id</th>
        <th>Paciente</th>
        <th>Medicamento recetado</th>
        <th>Cantidad</th>
        <th>Estado de la receta</th>
        <th>Opciones</th>
        </tr>
    </tr>
        <tr>";

        $registro=$registros->select($receta);
        if(!$registro==null){
            while($r=$registro->fetch_assoc()){
                $salida.="<tr>";
                $salida.="<td>$r[Id_recetas]</td>
                <td>$r[Mascota]</td>
                <td>$r[Medicamento]</td>
                <td>$r[Cantidad]</td>
                <td>$r[Estado_receta]</td>
                ";
                $salida.= "<td><button type='submit' class='btn btn-forms' value='$r[Id_recetas]' name='editarReceta'><i class='far fa-edit'></i>Editar</button>
                <td><button type='button' class='btn btn-forms' name='printReceta' onclick='window.print();'><i class='far fa-edit'></i>Imprimir</button></td>
				</tr>";
            }
        }

        echo $salida.="</tr>";
?>