<?php
require ("conexion.php");

class Medicamentos extends Conexion{

    public function insert($medicamento,$minimo,$detalles){
        $sql="insert into medicamentos (Nombre ,Minimo_Stock ,Detalles ) values ('$medicamento',$minimo,'$detalles')";
        parent::ejecutar($sql);
    }
}