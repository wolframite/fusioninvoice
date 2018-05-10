<?php

// Require the API class.
require __DIR__ . '/../fiapi.php';

// Require our API config variables.
require 'apiconfig.php';

// Create an instance of the API client library.
$fiapi = new fiapi($baseURL, $apiPublicKey, $apiSecretKey);

// Attempt to retrieve a client by id.
$fiapi->showClient(['id' => 14]);

if ($fiapi->getHttpStatus() == 200)
{
    // It was successful, and here's the client record.
    $client = $fiapi->getResponse();

    var_dump($client);
}
else
{
    // It was not successful. Let's check the messages to see what went wrong.
    $messages = $fiapi->getResponse();

    var_dump($messages);
}