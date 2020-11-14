<?php
namespace jenn0pal\Paymongo\Tests;

use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    protected $config = [
        'secret_key' => 'secret'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->config = [
            'secret_key' => getenv('PAYMONGO_SECRET_KEY')
        ];
    }

}
