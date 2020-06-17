<?php
use PHPUnit\Framework\TestCase;

final class ConexionTest extends TestCase{
    public function testblackList(){
        $obj=new Conexion;
        $this->assertEquals("Hola mundo",$obj->blackList('Hola, "mundo'));
    }
}
?>


phpunit --bootstrap D:\Documentos\XAMPP\htdocs\LaHuellita\php\conexion.php D:\Documentos\XAMPP\htdocs\LaHuellita\test\conexionTest.php