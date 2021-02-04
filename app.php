<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');

require 'vendor/autoload.php';
$data = require_once ($_SERVER['DOCUMENT_ROOT'].'/data.php');

use Classes\AppClass;
use Classes\SearchClass;

$app = new AppClass();
$client = new SearchClass($app->getClient());

if(isset($_GET['find']) && $_GET['find'] == 'yes') {
    $responce = $client->filter($_POST);
    $data = isset($responce['hits']['hits']) ? $responce['hits']['hits'] : array();
    echo json_encode($data);
    die();
}

$client->importData($data);