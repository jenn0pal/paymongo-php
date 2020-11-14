<?php
namespace jenn0pal\Paymongo\Tests;


use jenn0pal\Paymongo\Paymongo;

class PaymentTest extends BaseTestCase
{
    public function testPaymentCanListAllPayments()
    {

        $result = Paymongo::payment($this->config)->list();
        self::assertArrayHasKey('data', $result);
        self::assertIsArray($result);
        self::assertGreaterThan(1, count($result['data']));
    }

}
