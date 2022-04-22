<?php

namespace Test\Unit;

use PHPUnit\Framework\TestCase;
use App\Server;
use Config\Conection;

/** @testdox Test para Cursos */
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

    //! CONEXION (1 test)
        /**
         * @testdox Realizar conexión a la DB
         */
        public function testConection()
        {
            self::assertTrue(is_object($this->conn));
        }

    //! OBTENER CURSOS (1 test)
        /**
         * @testdox Listar todos los cursos
         */
        public function testGetCursos()
        {
            $cursos = $this->server->obtenerCursos();

            self::assertTrue($cursos > 0);        
        }

    //! OBTENER CURSO (3 test)
        /**
         * @testdox Listar un curso en particular (200)
         */
        public function testGetCurso()
        {
            $curso = $this->server->obtenerCurso('1');

            self::assertTrue($curso > 0);        
        }

        /**
         * @testdox Listar un curso en particular (400 - Id)
         */
        public function testNoIdGetCurso()
        {
            $curso = $this->server->obtenerCurso('');

            self::assertTrue($curso['success'] == '400');        
        }

        /**
         * @testdox Listar un curso en particular (404)
         */
        public function testNoGetCurso()
        {
            $curso = $this->server->obtenerCurso('2');

            self::assertTrue($curso['success'] == '404');        
        }

    //! NUEVO CURSO (2 test)
        /**
         * @testdox Guardar un nuevo curso (201)
         */
        public function testNewCurso()
        {
            $curso = $this->server->nuevoCurso('curso 12');

            self::assertTrue($curso['success'] == '201');        
        }

        /**
         * @testdox Guardar un nuevo curso (400 - Nombre)
         */
        public function testNoNameNewCurso()
        {
            $curso = $this->server->nuevoCurso('');

            self::assertTrue($curso['success'] == '400');        
        }

    //! ACTUALIZAR CURSO (4 test)
        /**
         * @testdox Actualizar un curso en particular (200)
         */
        public function testUpdateCurso()
        {
            $curso = $this->server->actualizarCurso(['id' => '15', 'nombre' => 'curso N 15']);

            self::assertTrue($curso['success'] == '200');         
        }

        /**
         * @testdox Actualizar un curso en particular (400 - Id)
         */
        public function testNoIdUpdateCurso()
        {
            $curso = $this->server->actualizarCurso(['id' => '', 'nombre' => 'curso 15']);

            self::assertTrue($curso['success'] == '400');         
        }

        /**
         * @testdox Actualizar un curso en particular (400 - Nombre)
         */
        public function testNoNameUpdateCurso()
        {
            $curso = $this->server->actualizarCurso(['id' => '15', 'nombre' => '']);

            self::assertTrue($curso['success'] == '400');         
        }

        /**
         * @testdox Actualizar un curso en particular (404)
         */
        public function testNoUpdateCurso()
        {
            $curso = $this->server->actualizarCurso(['id' => '18', 'nombre' => 'curso 18']);

            self::assertTrue($curso['success'] == '404');         
        }

    //! ELIMINAR CURSO (3 test)
        /**
         * @testdox Eliminar un curso en particular (200)
         */
        public function testDeleteCurso()
        {
            $curso = $this->server->eliminarCurso('22');

            self::assertTrue($curso['success'] == '200');         
        }

        /**
         * @testdox Eliminar un curso en particular (400 - Id)
         */
        public function testNoIdDeleteCurso()
        {
            $curso = $this->server->eliminarCurso('');

            self::assertTrue($curso['success'] == '400');         
        }

        /**
         * @testdox Eliminar un curso en particular (404)
         */
        public function testNoDeleteCurso()
        {
            $curso = $this->server->eliminarCurso('18');

            self::assertTrue($curso['success'] == '404');         
        }
}