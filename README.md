# Paymongo PHP Wrapper

This a framework agnostic PHP wrapper for accessing Paymongo API.

- [Installation](#installation)
- [Usage](#usage)


### Installation
```sh
composer require jenn0pal\paymongo-php
```

### Usage

For payload, please refer to [Paymongo API reference](https://developers.paymongo.com/reference)
 
 ```php
use jenn0pal\Paymongo\Paymongo;

$config = [
    'secret_key' => 'YOUR-SECRET-KEY'
];
$payload = [
    'data' => [
        'attributes' => [
            'amount' => 10000,
            'payment_method_allowed' => ['card'],
            'payment_method_options' => [
                'card' => ['request_three_d_secure']
            ],
            'description' => 'A payment intent',
            'statement_descriptor' => 'MyStore',
            'currency' => 'PHP',
            'metadata' => []
        ]
    ]
];


$paymentIntent = Paymongo::payment($config)->create($payload);
 

 ```
