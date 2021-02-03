<?php

define('CONNECT_IP', "192.168.99.100");
define('CONNECT_PORT', "9200");

define('ITEM_IMPORT', 100);

define('LIMIT_SEARCH', 10);


function printr($data = array()) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}