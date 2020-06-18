<?php
    require ("conexion.php");

    class Receta extends Conexion {

        private $medicamento;
        private $cantidad;
        private $paciente;
        private $estadoReceta;

        public function setMedicamento($medicamento){
            $this->medicamento=($medicamento);
        }

        public function setCantidad($cantidad){
            $this->cantidad=($cantidad);
        }

        public function setPaciente($paciente){
            $this->paciente=($paciente);
        }

        public function setEstado($estadoReceta){
            $this->estadoReceta=($estadoReceta);
        }


        public function insertReceta(){
           $stock=parent::ejecutar("select (select sum(cantidad) as entrada from entrada_medicamentos em where Medicamento = $this->medicamento)-
(select sum(Cantidad) as salida from recetas r2 where Medicamento = $this->medicamento and Estado =1) - $this->cantidad as 'maximo'")->fetch_assoc();
            $cantidad=$stock["maximo"];
           if($cantidad<0 && $this->estadoReceta==1){
               echo "No se puede ralizar esta transaccion";
           }else{
               echo "$this->cantidad";
                $sql="insert into recetas (Mascota ,Medicamento ,Cantidad ,Estado ) values
                 ($this->paciente,$this->medicamento,$this->cantidad,$this->estadoReceta)";
            parent::ejecutar($sql);
        }
        }

        public function select($r){
            $respuesta=parent::ejecutar("select r.Id_recetas, r.Cantidad, m.Nombre as Medicamento, p.Nombre as Mascota, e.Estado_receta from recetas r
            inner join medicamentos m on m.Id_Medicamento = r.Medicamento
            inner join estados_recetas e on e.Id_Estado = r.Estado
            inner join mascotas p on p.Id_mascota = r.Mascota where p.Nombre like ('%$r%')");
            return $respuesta;
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
        public function editar($id){
            $sql="UPDATE veterinaria.recetas
            SET Mascota=$this->paciente, Medicamento=$this->medicamento, Cantidad='$this->cantidad', Estado=$this->estadoReceta
            WHERE Id_recetas=$id;";
            parent::ejecutar($sql);
        }
       
        
    }
?>