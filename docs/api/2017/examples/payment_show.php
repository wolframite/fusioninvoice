<?php

// Require the API class.
require __DIR__ . '/../fiapi.php';

// Require our API config variables.
require 'apiconfig.php';

// Create an instance of the API client library.
$fiapi = new fiapi($baseURL, $apiPublicKey, $apiSecretKey);

// Attempt to retrieve a payment by id.
$fiapi->showPayment(['id' => 1]);

if ($fiapi->getHttpStatus() == 200)
{
    // It was successful, and here's the payment record.
    $payment = $fiapi->getResponse();

    var_dump($payment);
}
else
{
    // It was not successful. Let's check the messages to see what went wrong.
    $messages = $fiapi->getResponse();

    var_dump($messages);
}