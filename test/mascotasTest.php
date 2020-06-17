<?php
use PHPUnit\Framework\TestCase;

final class MascotasTest extends TestCase{
    public function testSelect(){
        $obj=new mascotas;
        $mascota=$obj->select("Luna")->fetch_assoc();
        $this->assertEquals("1",$mascota["Id_mascota"]);
        $this->assertEquals("Luna",$mascota["Nombre"]);
        $this->assertEquals("2019-10-01",$mascota["Fecha_nacimiento"]);
        $this->assertEquals("Kevin",$mascota["Nombre_Cliente"]);
        $this->assertEquals("Hembra",$mascota["sexo"]);
        $this->assertEquals("Pitbull",$mascota["Raza"]);
    }
    public function testSexos(){
        $obj=new mascotas;
        $mascota=$obj->selectSexos()->fetch_assoc();
        $this->assertEquals("1",$mascota["Identificador"]);
        $this->assertEquals("Macho",$mascota["sexo"]);
    }
    public function testselectDueño(){
        $obj=new mascotas;
        $mascota=$obj->selectDueño()->fetch_assoc();
        $this->assertEquals("1",$mascota["Id_Cliente"]);
        $this->assertEquals("Kevin",$mascota["Nombre_Cliente"]);
        $this->assertEquals("Guevara",$mascota["Apelido_Cliente"]);
    }
    public function testselectRazas(){
        $obj=new mascotas;
        $mascota=$obj->selectRazas()->fetch_assoc();
        $this->assertEquals("1",$mascota["Id_raza"]);
        $this->assertEquals("Pitbull",$mascota["Raza"]);
    }
    public function testselectM(){
        $obj=new mascotas;
        $mascota=$obj->selectM(1)->fetch_assoc();
        $this->assertEquals("Luna",$mascota["Nombre"]);
        $this->assertEquals("2019-10-01",$mascota["Fecha_nacimiento"]);
        $this->assertEquals("1",$mascota["Id_cliente"]);
        $this->assertEquals("Hembra",$mascota["sexo"]);
        $this->assertEquals("1",$mascota["Id_raza"]);
    }
    public function testselectMascota(){
        $obj=new mascotas;
        $mascota=$obj->selectMascota(1);
        $this->assertEquals("Luna",$mascota["Nombre"]);
        $this->assertEquals("2019-10-01",$mascota["Fecha_nacimiento"]);
    }
}

?>
phpunit --bootstrap D:\Documentos\XAMPP\htdocs\LaHuellita\php\mascotas.php D:\Documentos\XAMPP\htdocs\LaHuellita\test\mascotasTest.php