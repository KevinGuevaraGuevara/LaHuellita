<?php
use PHPUnit\Framework\TestCase;

final class citasTest extends TestCase{

    public function testSelect(){
        $obj=new Citas;
        $cita=$obj->select("Luna")->fetch_assoc();
        $this->assertEquals("2",$cita["Id_Cita"]);
        $this->assertEquals("Luna",$cita["Nombre"]);
        $this->assertEquals("Patricio",$cita["Nombre_Empleado"]);
        $this->assertEquals("2020-06-10",$cita["Fecha"]);
        $this->assertEquals("03:30",$cita["Hora"]);
        $this->assertEquals("Pendiente",$cita["Estado"]);
        $this->assertEquals("",$cita["Detalles"]);
    }
    public function testselectporfecha(){
        $obj=new Citas;
        $cita=$obj->selectporfecha("2020-06-10")->fetch_assoc();
        $this->assertEquals("2",$cita["Id_Cita"]);
        $this->assertEquals("Luna",$cita["Nombre"]);
        $this->assertEquals("Patricio",$cita["Nombre_Empleado"]);
        $this->assertEquals("2020-06-10",$cita["Fecha"]);
        $this->assertEquals("03:30",$cita["Hora"]);
        $this->assertEquals("Pendiente",$cita["Estado"]);
        $this->assertEquals("",$cita["Detalles"]);
    }
    public function textselectDoctores(){
        $obj=new Citas;
        $cita=$obj->selectDoctores()->fetch_assoc();
        $this->assertEquals("12312332-3",$cita["DUI"]);
        $this->assertEquals("Bob",$cita["Nombre_Empleado"]);
      
    }
    public function testselectPacientes(){
        $obj=new Citas;
        $cita=$obj->selectPacientes()->fetch_assoc();
        $this->assertEquals("1",$cita["Id_mascota"]);
        $this->assertEquals("Luna",$cita["Nombre"]);
        $this->assertEquals("Kevin",$cita["Nombre_Cliente"]);
        $this->assertEquals("Guevara",$cita["Apelido_Cliente"]);
      
    }

}

?>
phpunit --bootstrap D:\Documentos\XAMPP\htdocs\LaHuellita\php\citas.php D:\Documentos\XAMPP\htdocs\LaHuellita\test\citasTest.php