<?php
require ("conexion.php");

class Mascotas extends Conexion{
    private $nombre;
    private $fechaNacimiento;
    private $Raza;
    private $dueño;
    private $sexo;
  
    //private $cn;

    //public function __construct(){
        //$this->cn=new Conexion;
    //}
    public function setNombre($nombre){
        
        $this->nombre=parent::blackList($nombre);
    }
    public function setFechanacimiento($fechaNacimiento){
        $this->fechaNacimiento=parent::blackList($fechaNacimiento);
    }
    public function setRaza($Raza){
        $this->Raza=parent::blackList($Raza);
    }
    public function setDueño($dueño){
        $this->dueño=parent::blackList($dueño);
    }
    public function setSexo($sexo){
        $this->sexo=parent::blackList($sexo);
        
    }
 
    public function getNombre(){
        return $this->nombre;
    }
    public function getFechanacimiento(){
        return $this->fechaNacimiento;
    }
    public function getRaza(){
        return $this->Raza;
    }
    public function getDueño(){
        return $this->dueño;
    }
    public function getSexo(){
        return $this->sexo;
    }
   
    
    public function insert(){
      $sql="INSERT INTO mascotas
      (Nombre, Fecha_nacimiento, Raza, Dueño, Sexo)
      VALUES('$this->nombre', '$this->fechaNacimiento', $this->Raza, $this->dueño, $this->sexo)";
     
     
      parent::ejecutar($sql);
    }
    public function select(){
        $respuesta = parent::ejecutar("select m.Id_mascota , m.Nombre ,m.Fecha_nacimiento,c.Nombre_Cliente,s.sexo ,r.Raza from mascotas m 
        inner join clientes c on c.Id_Cliente = m.Dueño
        inner join sexos s on s.Identificador = m.Sexo 
        inner join razas r on r.Id_raza = m.Raza ");
        return $respuesta;
    }
    protected function delete(){}
    protected function modifie(){}

    public function selectSexos(){
        $respuesta = parent::ejecutar("select * from sexos");
        return $respuesta;
    }
    public function selectDueño(){
        $respuesta = parent::ejecutar("select Id_Cliente ,Nombre_Cliente ,Apelido_Cliente from clientes");
        return $respuesta;
    }
    public function selectRazas(){
        $respuesta = parent::ejecutar("select Id_raza ,Raza from razas r");
        return $respuesta;
    }

}

?>