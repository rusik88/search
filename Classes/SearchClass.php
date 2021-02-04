<?php

namespace Classes;


class SearchClass
{
    private $builderClient;
    private $index = DB_INDEX;
    private $type = DB_TYPE;

    public function __construct($builderClient)
    {
        $this->builderClient = $builderClient;
    }

    public function importData($data = array())
    {
        if (!$this->builderClient->indices()->exists(['index' => $this->index])) {
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
                    $this->builderClient->index($params);
                }
            }
        }
    }

    public function search($match_arr = array()) {

        if(!empty($match_arr)) {
            $params = [
                'index' => $this->index,
                'size'   => LIMIT_SEARCH,
                'body'  => [
                    'query' => $match_arr
                ]
            ];
            return $this->builderClient->search($params);
        } else {
            return array();
        }
    }

    public function filter($post) {
        $data = array();

        $data['bool']['must'] = array();

        if(isset($post['name']) && !empty($post['name'])) {
            $data['bool']['must'][] = ['regexp' => ['name' => mb_strtolower($post['name']).'.*']];
        }

        if(isset($post['phone']) && !empty($post['phone'])) {
            $data['bool']['must'][] = ['regexp' => ['phone' => '.*38'.$post['phone'].'.*']];
        }

        $age_min = isset($post['age_min']) && !empty($post['age_min']) ? $post['age_min'] : 0;
        $age_max = isset($post['age_max']) && !empty($post['age_max']) ? $post['age_max'] : 0;

        $data['bool']['must'][] = ['range' => [
            'age' => [
                'gte' => $age_min,
                'lte' => $age_max,
            ],
        ]];

        if(isset($post['email']) && !empty($post['email'])) {
            $data['bool']['must'][] = ['match' => ['email' => $post['email']]];
        }

        if(empty($data['bool']['must'])) return array();

        return $this->search($data);
    }
}