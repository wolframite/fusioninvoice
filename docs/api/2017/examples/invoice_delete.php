<?php

// Require the API class.
require __DIR__ . '/../fiapi.php';

// Require our API config variables.
require 'apiconfig.php';

// Create an instance of the API client library.
$api = new fiapi($baseURL, $apiPublicKey, $apiSecretKey);

// Issue the command to delete the record by the id.
$api->deleteInvoice(['id' => 13]);

// Was the request successful?
if ($api->getHttpStatus() == 200)
{
    // It was successful, but no result is returned on delete.
}
else
{
    // It was not successful. Let's check the messages to see what went wrong.
    $errors = $api->getResponse();

    var_dump($errors);
}