<?php

        require ("veterinario.php");
        $expedientes = new Expediente();
        $nombre=$_GET["dato"];
        $salida="<table class='table table-striped'>
                <tr>
                <th>Id</th>
                <th>Paciente</th>
                <th>Observaciones</th>
                <th>Sintomas</th>
                <th>Vacunas</th>
                <th>Medicamentos consumidos</th>
              
                </tr>
            </tr>
                <tr>";
        $expediente=$expedientes->select($nombre);
        if(!$expediente==null){
            while($e=$expediente->fetch_assoc()){
                $salida.="<tr>";
                $salida.="<td>$e[id_expendiente]</td>
                <td>$e[Nombre]</td>
                <td>$e[obervaciones]</td>
                <td>$e[sintomas]</td>
                <td>$e[vacunas]</td>
                <td>$e[consume_medicamento]</td>";
                
                $salida.="
                
                </tr>";
                
                
            }
        }
        echo $salida;
        
   
				
?>