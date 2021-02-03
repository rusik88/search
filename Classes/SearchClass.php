<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03.02.2021
 * Time: 08:50
 */

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

    public function info() {
        return $this->builderClient->info();
    }

    public function create($params) {
        $this->builderClient->index($params);
    }

    public function getAll() {
        $params = [
            'size'   => ITEM_IMPORT,
            'index'  => $this->index,
        ];
        return $this->builderClient->search($params);
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
}