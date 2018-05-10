<?php

// Require the API class.
require __DIR__ . '/../fiapi.php';

// Require our API config variables.
require 'apiconfig.php';

// Create an instance of the API client library.
$fiapi = new fiapi($baseURL, $apiPublicKey, $apiSecretKey);

// Create an array for the new client record.
// Required fields: name, unique_name
// Any other fields from the clients table can optionally be included in this array.
$newClient = ['name' => 'New Client', 'unique_name' => 'New Client'];

// Pass the record through the API.
$fiapi->createClient($newClient);

// Was the request successful?
if ($fiapi->getHttpStatus() == 200)
{
    // It was successful, and here's the new client record in case we need to do anything else with it.
    $createdClient = $fiapi->getResponse();

    var_dump($createdClient);
}
else
{
    // It was not successful. Let's check the messages to see what went wrong.
    $errors = $fiapi->getResponse();

    var_dump($errors);
}