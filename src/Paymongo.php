<?php


namespace jenn0pal\Paymongo;


use GuzzleHttp\Client;

class Paymongo
{
    const API_URL = 'https://api.paymongo.com/v1/';
    protected $endpoint = '';
    protected $config = [];
    protected $client = null;
    protected $headers = ['Content-Type' => 'application/json'];

    public function __construct(array $config = [])
    {
        $this->config = array_merge([
            'api_url' => $config['api_url'] ??
                (getenv('PAYMONGO_API_URL') ? getenv('PAYMONGO_API_URL') : self::API_URL),
            'public_key' => $config['public_key'] ??
                (getenv('PAYMONGO_PUBLIC_KEY') ? getenv('PAYMONGO_PUBLIC_KEY') : 'public'),
            'secret_key' => $config['secret_key'] ??
                (getenv('PAYMONGO_SECRET_KEY') ? getenv('PAYMONGO_SECRET_KEY') : 'secret'),
        ], $config);

        $this->client = new Client([
            'base_uri' => $this->config['api_url'],
            'verify' => false,
        ]);
    }

    public function generateAuth($key)
    {
        return [$key, ''];
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function send($method, $endpoint, array $payload = [], array $options = [])
    {
        $options = array_merge($options, [
            'headers' => $this->headers,
            'auth' => $this->generateAuth($this->config['secret_key']),
            'json' => $payload,
        ]);

        return json_decode($this->client->request($method, $endpoint, $options)->getBody(), true);
    }

    public function create(array $payload)
    {
        return $this->send('POST', $this->endpoint, $payload);
    }

    public function retrieve($id)
    {
        return $this->send('GET', $this->endpoint.'/'.$id);
    }

    public static function payment($config = [])
    {
        return new Payment($config);
    }

    public static function paymentMethod($config = [])
    {
        return new PaymentMethod($config);
    }

    public static function paymentIntent($config = [])
    {
        return new PaymentIntent($config);
    }

    public static function source($config = [])
    {
        return new Source($config);
    }

    public static function webhook($config = [])
    {
        return new Webhook($config);
    }

}

