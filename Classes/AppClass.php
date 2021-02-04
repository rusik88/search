<?php

namespace Classes;

use Elasticsearch\ClientBuilder;


class AppClass
{
    private $client;

    public function __construct()
    {
        $this->client = ClientBuilder::create()
            ->setSSLVerification(false)
            ->setHosts([CONNECT_IP.':'.CONNECT_PORT])
            ->build();
    }

    public function getClient() {
        return $this->client;
    }
}