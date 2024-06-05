<?php

namespace App\Exceptions;

use Exception;

class InvalidPriceException extends Exception
{
    public function __construct($discountValue) {
        $message = "Invalid price: $discountValue";
        parent::__construct($message);
    }
}
