<?php


namespace jenn0pal\Paymongo;


class Payment extends Paymongo
{
    protected $endpoint = 'payments';

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    public function list()
    {
        return $this->send('GET', $this->endpoint);
    }
}
