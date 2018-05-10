<?php

// Require the API class.
require __DIR__ . '/../fiapi.php';

// Require our API config variables.
require 'apiconfig.php';

// Create an instance of the API client library.
$fiapi = new fiapi($baseURL, $apiPublicKey, $apiSecretKey);

// Perhaps we need to add or change client's email address. We'll identify the client by id and then include the values
// we want to update.
$clientUpdate = ['id' => 42, 'email' => 'client@email.com'];

// Issue the command to update the record.
$fiapi->updateClient($clientUpdate);

if ($fiapi->getHttpStatus() == 200)
{
    // It was successful, and here's the updated client record.
    $client = $fiapi->getResponse();

    var_dump($client);
}
else
{
    // It was not successful. Let's check the messages to see what went wrong.
    $messages = $fiapi->getResponse();

    var_dump($messages);
}