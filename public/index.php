<?php

use LaMetric\{Api, Response, Validator};

use GuzzleHttp\Client;

require_once __DIR__ . '/../vendor/autoload.php';

header('Content-Type: application/json');

$response = new Response();

try {
    $parameters  = include_once __DIR__ . '/../config/fields.php';

    $validator = new Validator($_GET);
    $validator->check($parameters);

    $api    = new Api(new Client());
    $frames = $api->fetchData($validator->getData());

    echo $response->printData($frames);
} catch (Exception $exception) {
    echo $response->printError($exception->getMessage());
}
