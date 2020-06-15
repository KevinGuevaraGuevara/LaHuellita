<?php
use PHPUnit\Framework\TestCase;

final class Clientestest extends TestCase{

    public function testSelect(){
        $obj=new Clientes;
        $cliente=$obj->select("Kevin")->fetch_assoc();
        $this->assertEquals("1",$cliente["Id_Cliente"]);
        $this->assertEquals("Kevin",$cliente["Nombre_cliente"]);
        $this->assertEquals("Guevara",$cliente["Apelido_Cliente"]);
        $this->assertEquals("60225678",$cliente["Telefono"]);
    }
}
?>
phpunit --bootstrap D:\Documentos\XAMPP\htdocs\LaHuellita\php\Clientes.php D:\Documentos\XAMPP\htdocs\LaHuellita\test\ClientesTest.php