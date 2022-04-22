<?php
namespace Test\Unit;

use PHPUnit\Framework\TestCase;
use App\Server;
use Config\Conection;


class BaseTest extends TestCase
{
    //! ejecucion antes de cada test (metodo de la clase TestCase)
    // principal funcion instanciar objetos
    protected function setUp(): void 
    {
        // crear nueva conexion
        $this->conn = new Conection();
        // instanciar server
        $this->server = new Server();
    }
    //! ejecucion despues de cada test (metodo de la clase TestCase)
    // principal uso cerrar una conexion a la DB, socket o archivo
    protected function tearDown(): void
    {
        
    }
}