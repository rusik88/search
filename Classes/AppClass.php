<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03.02.2021
 * Time: 08:20
 */

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

    public function importData($data = array())
    {
        $data_rows = [];
        if (!$this->getClient()->indices()->exists(['index' => $this->index])) {
            if (
                !empty($data) &&
                isset($data['age']) && !empty($data['age']) &&
                isset($data['name']) && !empty($data['name']) &&
                isset($data['email']) && !empty($data['email']) &&
                isset($data['phone']) && !empty($data['phone'])

            ) {
                for ($i = 0; $i < ITEM_IMPORT; $i++) {
                    $row = [
                        'age' => $data['age'][rand(0, count($data['age']) - 1)],
                        'name' => $data['name'][rand(0, count($data['name']) - 1)],
                        'email' => $data['email'][rand(0, count($data['email']) - 1)],
                        'phone' => $data['phone'][rand(0, count($data['phone']) - 1)],
                    ];
                    $params = [
                        'index' => $this->index,
                        'type' => $this->type,
                        'body' => $row
                    ];
                    $this->client->index($params);
                }
            }
        }
    }
}