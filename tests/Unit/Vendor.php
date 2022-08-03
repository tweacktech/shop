<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class Vendor extends TestCase
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

    public function test_show()
    {
      $response= $this->assertDatabaseHas('vendors');
    }
}
