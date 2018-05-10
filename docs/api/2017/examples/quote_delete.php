<?php

// Require the API class.
require __DIR__ . '/../fiapi.php';

// Require our API config variables.
require 'apiconfig.php';

// Create an instance of the API client library.
$fiapi = new fiapi($baseURL, $apiPublicKey, $apiSecretKey);

// Issue the command to delete the record by the id.
$fiapi->deleteQuote(['id' => 1]);

// Was the request successful?
if ($fiapi->getHttpStatus() == 200)
{
    // It was successful, but no result is returned on delete.
}
else
{
    // It was not successful. Let's check the messages to see what went wrong.
    $errors = $fiapi->getResponse();

    var_dump($errors);
}