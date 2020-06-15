<?php

class Conexion{

    //private $servidor="fdb20.awardspace.net";private $usuario="3051330_veterinaria";private $clave="apolo117";private $db="3051330_veterinaria";private $cn;
    private $servidor="localhost";private $usuario="root";private $clave="";private $db="veterinaria";
    
    public function __construct(){
         $this->cn= new mysqli($this->servidor,$this->usuario,$this->clave,$this->db);
    if($this->cn->connect_error){
        die("Conexion fallida".$this->cn -> connect_error);
    }
    }
    public function ejecutar($sql){
        //$l=$cn->query("select Nombre from empleados e where Priviliegios = 2");
        //$l=$l->fetch_assoc();
        //return $l["Nombre"];
        return $this->cn->query($sql);
    }
    public function blackList($cadena){
        $str=str_split($cadena);
        $filtado="";

        foreach($str as $letra){
            if(!($letra=="'"||$letra=="."||$letra=='"'||$letra==',')){
                $filtado.=$letra;
            }
        }
        return $filtado;
        
    }
 
   

}


?>