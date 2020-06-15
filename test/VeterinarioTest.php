<?php
use PHPUnit\Framework\TestCase;

final class VeterinarioTest extends TestCase{

    public function testselectNombre(){
        $obj=new Expediente;
        $ex=$obj->selectNombre()->fetch_assoc();
        $this->assertEquals("Luna",$ex["Nombre"]);
        $this->assertEquals("1",$ex["Id_mascota"]);
    }
    public function testselect(){
        $obj=new Expediente;
        $ex=$obj->select("Luna")->fetch_assoc();
        $this->assertEquals("1",$ex["id_expendiente"]);
        $this->assertEquals("No",$ex["vacunas"]);
        $this->assertEquals("Estornudos",$ex["sintomas"]);
        $this->assertEquals("No",$ex["obervaciones"]);
        $this->assertEquals("No",$ex["consume_medicamento"]);
        $this->assertEquals("Luna",$ex["Nombre"]);
    }
}
?>
phpunit --bootstrap D:\Documentos\XAMPP\htdocs\LaHuellita\php\Veterinario.php D:\Documentos\XAMPP\htdocs\LaHuellita\test\VeterinarioTest.php