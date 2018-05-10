<?php

// Require the API class.
require __DIR__ . '/../fiapi.php';

// Require our API config variables.
require 'apiconfig.php';

// Create an instance of the API client library.
$fiapi = new fiapi($baseURL, $apiPublicKey, $apiSecretKey);

// Issue the command to retrieve a paginated list of records.
$fiapi->listPayments(['page' => 1]);

// Optionally, list payments for a specific invoice id (not the invoice number):
// $fiapi->listPayments(['page' => 1, 'invoice_id' => 52]);

// Or list payments for a specific invoice number (not the invoice id):
// $fiapi->listPayments(['page' => 1, 'invoice_number' => 'INV1002']);

// Or list payments for a specific client id:
// $fiapi->listPayments(['page' => 1, 'client_id' => 142]);

// Was the request successful?
if ($fiapi->getHttpStatus() == 200)
{
    // It was successful.
    $result = $fiapi->getResponse();

    // $result contains pagination information (total, last_page, etc).
    // $result['data'] contains the actual records.
    var_dump($result);
}
else
{
    // It was not successful. Let's check the messages to see what went wrong.
    $errors = $fiapi->getResponse();

    var_dump($errors);
}