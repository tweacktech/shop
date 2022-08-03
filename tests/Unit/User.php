<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class User extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }



    
public function test_post()
    {
        $response=$this->post('api/login',[
            'email'=>'meyor',
            'password'=>'1234'
        ]);
        $response->assertStatus(200);
    }


public function test_check()
    {
        $response=$this->assertDatabaseHas('users',[
            'email'=>'meyor@gmail.com',
            'phone'=>'33939'
        ]);
        // $response->assertStatus(200);
    }

}
