<?php
require ("conexion.php");

class Medicamentos extends Conexion{

    public function insert($medicamento,$minimo,$detalles){
        $sql="insert into medicamentos (Nombre ,Minimo_Stock ,Detalles ) values ('$medicamento',$minimo,'$detalles')";
        parent::ejecutar($sql);
    }
    public function select($nombre){
        $sql="SELECT * FROM medicamentos where Nombre like ('%$nombre%')";
        return parent::ejecutar($sql);
    }
    public function agregar($id,$cantidad,$fecha){
        $sql="insert into entrada_medicamentos (Medicamento ,Cantidad ,Fecha_entrad ) values ('$id',$cantidad,'$fecha')";
        parent::ejecutar($sql);
    }
    public function stock($medicamento){
        //$sql="select (select sum(cantidad) from entrada_medicamentos em where Medicamento = $medicamento)- 
        //(select sum(Cantidad) from recetas r2 where Medicamento = $medicamento and Estado =1)
        //as stock";
        $entradas=parent::ejecutar("select sum(cantidad) as entrada from entrada_medicamentos em where Medicamento = $medicamento")->fetch_assoc();
        $salidas=parent::ejecutar("select sum(Cantidad) as salida from recetas r2 where Medicamento = $medicamento and Estado =1")->fetch_assoc();
        
        return $entradas["entrada"]-$salidas["salida"];
    }
   
}
?>