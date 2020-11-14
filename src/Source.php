<?php


namespace jenn0pal\Paymongo;


class Source extends Paymongo
{
    protected $endpoint = 'sources';

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

}
