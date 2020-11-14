<?php


namespace jenn0pal\Paymongo;


class Webhook extends Paymongo
{
    protected $endpoint = 'webhooks';

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    public function list()
    {
        return $this->send('GET', $this->endpoint);
    }

    public function disable($id)
    {
        return $this->send('POST', "{$this->endpoint}/{$id}/disable");
    }

    public function enable($id)
    {
        return $this->send('POST', "{$this->endpoint}/{$id}/enable");
    }
}
