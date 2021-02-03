<?php

namespace Classes;

use Elasticsearch\ClientBuilder;


class AppClass
{
    private $client;
    private $index = 'users';
    private $type = 'user';

    public function __construct($ip, $connect_port)
    {
        $this->client = ClientBuilder::create()
            ->setSSLVerification(false)
            ->setHosts(['192.168.99.100:9200'])
            ->build();
    }

    public function getClient() {
        return $this->client;
    }
}