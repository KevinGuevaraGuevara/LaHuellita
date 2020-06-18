<?php 
    require ("conexion.php");
     class Expediente extends Conexion {
        private $nomMacota;
        private $observacion;
        private $sintoma;
        private $vacunas;
        private $consume;


        public function setNomascota($nomMacota){
            $this->nomMacota=parent::blacklist($nomMacota);
        }
        public function setObservaciones($observacion){
            $this->observacion=parent::blacklist($observacion);
        }
        public function setSintomas($sintoma){
            $this->sintoma=parent::blacklist($sintoma);
        }
        public function setVacuna($vacunas){
            $this->vacunas=parent::blacklist($vacunas);
        }
        public function setConsume($consume){
            $this->consume=parent::blacklist($consume);
        }


        public function insert(){
            $sql = "INSERT INTO expediente_mascota
            (vacunas, sintomas, obervaciones, consume_medicamento, mascota_nombre)VALUES('$this->vacunas','$this->sintoma',
            '$this->observacion','$this->consume', $this->nomMacota)";

            parent::ejecutar($sql);
            
           
        }

        public function selectNombre(){
           $respuesta = parent::ejecutar("select Nombre, Id_mascota from mascotas");
           //while ($m=$respuesta->fetch_assoc()) {
            //echo "<option value='$m[Id_mascota]'>$m[Nombre]</option>";
           //}
            return $respuesta;

            /*select m.Nombre, Id_mascota from mascotas
           */ 
        }

        public function select($n){
            $respuesta = parent::ejecutar("select e.id_expendiente, e.vacunas, e.sintomas, e.obervaciones,e.consume_medicamento, m.Nombre from expediente_mascota e
            inner join mascotas m on m.Id_mascota=e.mascota_nombre where m.Nombre like ('%$n%')");
            return $respuesta;
        }

        public function editar($id){
            $sql="UPDATE veterinaria.expediente_mascota
            SET vacunas='$this->vacunas', sintomas='$this->sintoma', obervaciones='$this->observacion',consume_medicamento='$this->consume',mascota_nombre=$this->nomMascota
            WHERE id_expendiente=$id;";

            parent::ejecutar($sql);
        }


        
     }
     
         
     
     
?>