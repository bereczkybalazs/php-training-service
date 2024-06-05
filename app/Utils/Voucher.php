<?php

namespace App\Utils;
use App\Exceptions\InvalidDiscountException;

class Voucher {
    public static function apply($price, $discount) {

        if($discount > 100 || $discount < 0) {
            throw new InvalidDiscountException($discount);
        }

        return $price * (100 - $discount) / 100;
    }
}
