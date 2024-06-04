<?php

namespace Tests\Unit\Utils\Math;

use App\Utils\Math;
use PHPUnit\Framework\TestCase;

class SumTest extends TestCase
{
    public function test_positive_numbers(): void
    {
        $this->assertEquals(3, Math::sum(1, 2));
    }

    public function test_negative_and_positive_numbers(): void
    {
        $this->assertEquals(-3, Math::sum(-5, 2));
    }

    public function test_negative_numbers(): void
    {
        $this->assertEquals(-7, Math::sum(-5, -2));
    }

    public function test_positive_and_negative_numbers(): void
    {
        $this->assertEquals(0, Math::sum(5, -5));
    }

    public function test_zero_numbers(): void
    {
        $this->assertEquals(0, Math::sum(0, 0));
    }
}
