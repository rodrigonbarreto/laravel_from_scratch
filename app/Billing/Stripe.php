<?php

namespace App\Billing;

class Stripe
{
    protected $key;

    public function __construct($key)
    {
        return $this->key = $key;
    }
}
