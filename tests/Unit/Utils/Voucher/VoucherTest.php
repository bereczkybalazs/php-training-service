<?php

namespace Tests\Unit\Utils\Voucher;

use App\Exceptions\InvalidDiscountException;
use App\Utils\Voucher;
use PHPUnit\Framework\TestCase;

class VoucherTest extends TestCase
{

    public function test_50_discount(): void
    {
        $this->assertEquals(50, Voucher::apply(100, 50));
    }

    public function test_0_discount(): void
    {
        $this->assertEquals(500, Voucher::apply(500, 0));
    }

    public function test_100_discount(): void
    {
        $this->assertEquals(0, Voucher::apply(500, 100));
    }

    public function test_non_full_percent_price()
    {
        $this->assertEquals(194, Voucher::apply(200, 3));
    }

    public function test_zero_price_discount(): void
    {
        $this->assertEquals(0, Voucher::apply(0, 50));
    }

    public function test_discount_is_bigger_than_price(): void
    {
        $this->expectException(InvalidDiscountException::class);
        Voucher::apply(500, 101);
    }

    public function test_negative_discount(): void
    {
        $this->expectException(InvalidDiscountException::class);
        Voucher::apply(500, -200);
    }
}
