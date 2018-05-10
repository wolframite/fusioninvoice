<?php

// Require the API class.
require __DIR__ . '/../fiapi.php';

// Require our API config variables.
require 'apiconfig.php';

// Create an instance of the API client library.
$fiapi = new fiapi($baseURL, $apiPublicKey, $apiSecretKey);

// Attempt to retrieve an invoice by id.
$fiapi->showInvoice(['id' => 1]);

if ($fiapi->getHttpStatus() == 200)
{
    // It was successful, and here's the invoice record.
    $invoice = $fiapi->getResponse();

    var_dump($invoice);
}
else
{
    // It was not successful. Let's check the messages to see what went wrong.
    $messages = $fiapi->getResponse();

    var_dump($messages);
}