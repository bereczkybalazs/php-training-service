<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $response = 1;
        $this->assertSame(1, $response);
    }

    /**
     * A basic test example.
     */
    public function test_tamas_that_true_is_true(): void
    {
        $response = true;
        $this->assertEquals(1, $response);
        $this->assertSame(true, $response);
    }

    public function test_attila_that_true_is_true(): void
    {
        $response = 1;
        $this->assertSame(1, $response);
    }
}
