<?php


namespace jenn0pal\Paymongo\Tests;


use jenn0pal\Paymongo\Paymongo;

class SourceTest extends BaseTestCase
{
    protected $payload = [
        'data' => [
            'attributes' => [
                'type' => 'gcash',
                'amount' => 10000,
                'currency' => 'PHP',
                'redirect' => [
                    'success' => 'http://localhost',
                    'failed' => 'http://localhost',
                ],
            ],
        ],
    ];

    public function testSourceCanCreateGcashSource()
    {

        $result = Paymongo::source($this->config)->create($this->payload);
        self::assertArrayHasKey('data', $result);
        self::assertEquals('pending', $result['data']['attributes']['status']);
        self::assertEquals('gcash', $result['data']['attributes']['type']);

    }

    public function testSourceCanCreateGrabPaySource()
    {
        $payload = $this->payload;
        $payload['data']['attributes']['type'] = 'grab_pay';

        $result = Paymongo::source($this->config)->create($payload);

        self::assertArrayHasKey('data', $result);
        self::assertEquals('pending', $result['data']['attributes']['status']);
        self::assertEquals('grab_pay', $result['data']['attributes']['type']);

    }

    public function testSourceCanRetrieveSource()
    {
        $result = Paymongo::source($this->config)->create($this->payload);

        $source = Paymongo::source($this->config)->retrieve($result['data']['id']);
        self::assertEquals($result['data']['id'], $source['data']['id']);

    }
}
