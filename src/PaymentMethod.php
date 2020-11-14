<?php


namespace jenn0pal\Paymongo;


class PaymentMethod extends Paymongo
{
    protected $endpoint = 'payment_methods';

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }
}
