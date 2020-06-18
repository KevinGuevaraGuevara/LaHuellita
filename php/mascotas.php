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
 
    //public function getNombre(){
    //    return $this->nombre;
    //}
    //public function getFechanacimiento(){
    //    return $this->fechaNacimiento;
    //}
    //public function getRaza(){
    //    return $this->Raza;
    //}
    //public function getDueño(){
    //    return $this->dueño;
    //}
    //public function getSexo(){
    //    return $this->sexo;
    //}
   
    
    public function insert(){
      $sql="INSERT INTO mascotas
      (Nombre, Fecha_nacimiento, Raza, Dueño, Sexo)
      VALUES('$this->nombre', '$this->fechaNacimiento', $this->Raza, $this->dueño, $this->sexo)"; 
      parent::ejecutar($sql);
    }
    public function select($n){
        $respuesta = parent::ejecutar("select m.Id_mascota , m.Nombre ,m.Fecha_nacimiento,c.Nombre_Cliente,s.sexo ,r.Raza from mascotas m 
        inner join clientes c on c.Id_Cliente = m.Dueño
        inner join sexos s on s.Identificador = m.Sexo 
        inner join razas r on r.Id_raza = m.Raza where m.Nombre like ('%$n%') ");
        return $respuesta;
    }
   

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
    public function modificar($id){
        $sql="UPDATE veterinaria.mascotas
        SET Nombre='$this->nombre', Fecha_nacimiento='$this->fechaNacimiento', Raza=$this->Raza, Dueño=$this->dueño, Sexo=$this->sexo
        WHERE Id_mascota=$id;
        ";
        parent::ejecutar($sql);
    }
    public function selectM($n){
        $respuesta = parent::ejecutar("select m.Nombre ,m.Fecha_nacimiento,c.Id_cliente, s.sexo ,r.Id_raza from mascotas m 
        inner join clientes c on c.Id_Cliente = m.Dueño
        inner join sexos s on s.Identificador = m.Sexo 
        inner join razas r on r.Id_raza = m.Raza where m.Id_mascota = $n");
        return $respuesta;
    }
    public function selectMascota($id){
        $sql="SELECT Nombre, Fecha_nacimiento FROM mascotas where id_mascota=$id";
        return parent::ejecutar($sql)->fetch_assoc();
    }
    

}

?>