<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');

require 'vendor/autoload.php';
$data = require_once ($_SERVER['DOCUMENT_ROOT'].'/data.php');

use Classes\AppClass;
use Classes\SearchClass;

$app = new AppClass(CONNECT_IP, CONNECT_PORT);
$client = new SearchClass($app->getClient());

if(isset($_GET['find']) && $_GET['find'] == 'yes') {
    $client->filter($_POST);
    die();
}

$client->importData($data);

/*
$params['index'] = 'users';
$params['type'] = 'user';

$params = [
    'index' => 'users',
    'type' => 'user',
    'size' => 2,
    'body'  => [
        'query' => [
            'bool' => [
                'must' => [
                    ['regexp' => ['name' => 'иван.*']],
                    ['regexp' => ['phone' => '.*38063.*']],
                    ['range' => [
                        'age' => [
                            'gte' => 22,
                            'lte' => 30,
                        ],
                    ]],
                    [ 'match' => [ 'email' => 'test8@test.com' ] ]

                ],
            ]
        ]
    ]
];

printr($app->getClient()->search($params));*/


/*printr($client->search([
    'regexp' => [
        'phone' => [
            'value' => '/\+[0-9]{2}097.+/',
            'flags' => 'ALL',
            "case_insensitive" => true,
            "max_determinized_states" => 10000,
            "rewrite" => "constant_score"
        ]
    ]
]));

$params = [
    'index' => 'users'
];*/



//$response = $app->getClient()->indices()->delete($params);
//$response = $app->getClient()->indices()->exists($params);

//printr($response);




/*use Elasticsearch\ClientBuilder;



$client = ClientBuilder::create()
    ->setSSLVerification(false)
    ->setHosts(['192.168.99.100:9200'])
    ->build();

$params = [
    'index' => 'developers',
    'type' => 'developer',
    'body' => [ 'name' => 'Kemal4', 'last_name' => 'Yenilmez4']
];
$client->index($params);

//printr($response);


# Getting a document

$params = [
    'index' => 'developers'
];

$response = $client->search($params);

printr($response);*/

/*
 * $params = [
    'body' => [
        'query' => [
            'multi_match' => [
                'query' => 'Will Smith',
                'type' => 'cross_fields',
                'fields' => [
                    'first_name',
                    'last_name',
                ],
                'operator' => 'and',
            ],
        ],
    ],
];
$response = $client->search($params);
 */


/*********************************************/

/*
 *
 * $params = [
    'index' => 'users',
    'type' => 'user',
    'body'  => [
        'query' => [
            'regexp' => [
                'name' => [
                    'value' => 'светл.*',
                    'flags' => 'ALL',
                ],
            ],
        ],
    ]
];
printr($app->getClient()->search($params));
 */

/*
 *
 *
 * $params = [
    'index' => 'users',
    'type' => 'user',
    'body'  => [
        'query' => [
            'regexp' => [
                'phone' => [
                    'value' => '.*38063.*',
                    'flags' => 'ALL',
                ],
            ],
        ],
    ]
];
printr($app->getClient()->search($params));*/

/*
 * $params = [
    'index' => 'users',
    'type' => 'user',
    'body'  => [
        'query' => [
            'range' => [
                'age' => [
                    'gte' => 22,
                    'lt' => 27,
                ],
            ],
        ],
    ]
];
printr($app->getClient()->search($params));
 */

