<?php
 

require ("conexion.php");
class inicioSesion extends Conexion{

    private $user;
    private $pass;
    private $DUI;
    private $Nombre;
    private $privilegios;
    private $apellido;
   
    public function setUser($user){
        $this->user=parent::blackList($user);
    }
    public function setPass($pass){
        $this->pass=md5(base64_encode(parent::blackList($pass)));
    }
    public function setDUI($DUI){
        $this->DUI=$DUI;
    }
    public function setNombre($Nombre){
        $this->Nombre=$Nombre;
    }
    public function setPrivilegios($privilegios){
        $this->privilegios=$privilegios;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }

    public function Consulta(){
      //if(!($this->user || $this->pass)){
      //    echo "entro";
          $datos=parent::ejecutar("select usuario ,contrasenia, Priviliegios, estado from empleados where usuario = '".$this->user."'");
          if(!$datos==null){
              //while($m=$datos->fetch_assoc()){
                  $m=$datos->fetch_assoc();
                  //echo $this->pass."===>".$m["contrasenia"];
                  
                  if($this->pass==$m["contrasenia"]){
                    if($m["estado"]==2){
                        echo "Usuario no activo";
                    }else{

                        echo "exito";
                        $_SESSION["usuario"]=$this->user;
                        $_SESSION["pass"]=$this->pass;
                        $_SESSION["Priviliegios"]=$m["Priviliegios"];
                        switch($_SESSION["Priviliegios"]){
                            case 1:
                                header("location:perfil_administrador/empleados_index.php");
                            break;
                            case 2:
                                header("location:perfil_veterinario/expediente_index.php");
                            break;
                            case 3:
                                header("location:perfil_secretarios/citas_agregar.php");
                            break;
                        }
                    }
                    //header("location:../perfil.php");
                    
                }else{
                    echo "Contraseña incorrecta";
                }
                //}
                
            }else{
                echo"Usuario no encontrado";
            }
       // }
            
    }
    public function registrar(){
        $sql="INSERT INTO empleados
        (DUI, Nombre_Empleado, Apellido, Priviliegios, usuario, contrasenia)
        VALUES('$this->DUI', '$this->Nombre', '$this->apellido', $this->privilegios, '$this->user', '$this->pass')";
        try{
            parent::ejecutar($sql);
            header("location:index.php");
        }catch(Exception $ex){
            echo $ex;
        }
        
    }
    public function privilegios(){
        $sql="SELECT Id_Privilegios, Usuario
        FROM privilegios";
        return parent::ejecutar($sql);
    }

    public function select($p){
        $respuesta = parent::ejecutar("select e.DUI, e.Nombre_Empleado, e.Apellido, e.Usuario, p.Usuario as pri from empleados e
        inner join privilegios p on p.Id_privilegios=e.Priviliegios where p.Usuario like ('%$p%')");
        return $respuesta;
    }
    
    public function editarEmpleado($Dui, $estado){
       
        $sql="UPDATE veterinaria.empleados
        SET Nombre_Empleado='$this->Nombre', Apellido='$this->apellido', Priviliegios=$this->privilegios, usuario='$this->user', contrasenia='$this->pass', estado=$estado
        WHERE DUI='$Dui';";
        
        parent::ejecutar($sql);
    }
    public function selectE($dui){
        $respuesta = parent::ejecutar("SELECT * FROM veterinaria.empleados where DUI = '$dui'");
        return $respuesta;
    }
    
}
?>