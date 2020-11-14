<?php


namespace jenn0pal\Paymongo;


class PaymentIntent extends Paymongo
{
    protected $endpoint = 'payment_intents';

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    public function attach($id, array $payload)
    {
        return $this->send('POST', "{$this->endpoint}/{$id}/attach", $payload);
    }

}
