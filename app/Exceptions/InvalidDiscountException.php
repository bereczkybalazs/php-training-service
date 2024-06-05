<?php

namespace App\Exceptions;

use Exception;

class InvalidDiscountException extends Exception
{
    public function __construct($discountValue) {
        $message = "Invalid discount: $discountValue";
        parent::__construct($message);
    }
}
