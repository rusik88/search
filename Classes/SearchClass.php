<?php

namespace Classes;


class SearchClass
{
    private $builderClient;
    private $index = 'users';
    private $type = 'user';

    public function __construct($builderClient)
    {
        $this->builderClient = $builderClient;
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
                    $this->builderClient->client->index($params);
                }
            }
        }
    }

    public function search($match_arr = array()) {
        $params = [
            'index' => $this->index,
            'size'   => LIMIT_SEARCH,
            'body'  => [
                'query' => $match_arr
            ]
        ];

        return $this->builderClient->search($params);
    }

    public function filter($post) {
        $data = array();
        $data['bool']['must'] = array();

        if(isset($post['name']) && !empty($post['name'])) {
            $data['bool']['must'][] = ['regexp' => ['name' => $post['name'].'.*']]
        }

        if(isset($post['phone']) && !empty($post['phone'])) {
            $data['bool']['must'][] = ['regexp' => ['phone' => '.*38'.$post['phone'].'.*']];
        }

        if(
            isset($post['age_min']) && !empty($post['age_min']) &&
            isset($post['age_max']) && !empty($post['age_max'])
        ) {
            $data['bool']['must'][] = ['range' => [
                'age' => [
                    'gte' => $post['age_min'],
                    'lte' => $post['age_max'],
                ],
            ]];
        }

        if(isset($post['email']) && !empty($post['email'])) {
            $data['bool']['must'][] = ['match' => ['email' => $post['email']]]
        }

        return $this->search($data);
    }
}