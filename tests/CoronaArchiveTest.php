<?php
use PHPUnit\Framework\TestCase;

class EmptyTest extends TestCase{
    public function testFailure()
    {
        $this->assertEquals('bar', 'bar');    
    }

    public function add()
    {
        $this->assertEquals(5+5, 10);
    }

    public function test_home_page(self){
        $response = requests.get(self.API_URL)
        this->assertEqual(response.status_code, 200)
        # print(response.content)
        this->assertIn(b'The Best Web Service<br>for Corona Infections', response.content)
        }
    
}

// class 
