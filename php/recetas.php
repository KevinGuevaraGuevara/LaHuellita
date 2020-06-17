<?php
    require ("conexion.php");

    class Receta extends Conexion {

        private $medicamento;
        private $cantidad;
        private $paciente;
        private $estadoReceta;

        public function setMedicamento($medicamento){
            $this->medicamento=parent::blacklist($medicamento);
        }

        public function setCantidad($cantidad){
            $this->medicamento=parent::blacklist($cantidad);
        }

        public function setPaciente($paciente){
            $this->paciente=parent::blacklist($paciente);
        }

        public function setEstado($estadoReceta){
            $this->estadoReceta=parent::blacklist($estadoReceta);
        }


        public function insertReceta(){
            $sql="INSERT INTO recetas
            (Cantidad, Mascota, Medicamento, Estado)
            VALUES ('$this->cantidad', $this->paciente, $this->medicamento, $this->estadoReceta)";
            parent::ejecutar($sql);
        }

        public function select($r){
            $respuesta=parent::ejecutar("select r.Id_recetas, r.Cantidad, m.Nombre, p.Nombre, e.Estado_receta from from recetas r
            inner join medicamentos m on m.Id_Medicamento = r.Medicamento
            inner join estados_recetas e on e.Id_Estado = r.Estado
            inner join mascotas p on p.Id_mascota = r.Nombre where p.Nombre like ('%$r%')");
        }

        public function selectPaciente(){
            $respuesta=parent::ejecutar("select Id_mascota, Nombre from mascotas");
            return $respuesta;
        }
        public function selectMedicamento(){
            $respuesta=parent::ejecutar("select Id_Medicamento, Nombre from medicamentos");
            return $respuesta;
        }
        public function selectEstado(){
            $respuesta = parent::ejecutar("select Id_Estado, Estado_receta from estados_recetas");
            return $respuesta;
        }
        pubic function editar($id){
            $sql="UPDATE veterinaria.recetas
            SET Mascota=$this->paciente, Medicamento=$this->medicamento, Cantidad='$this->cantidad', Estado=$this->estadoReceta
            WHERE Id_recetas=$id;";
            parent::ejecutar($sql);
        }
        
    }
?>