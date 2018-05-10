<?php

// Require the API class.
require __DIR__ . '/../fiapi.php';

// Require our API config variables.
require 'apiconfig.php';

// Create an instance of the API client library.
$fiapi = new fiapi($baseURL, $apiPublicKey, $apiSecretKey);

// Issue the command to create the record.
// Required fields: invoice_id, amount, payment_method_id, paid_at (YYYY-MM-DD format).
$fiapi->createPayment(['invoice_id' => 15, 'amount' => 1044.44, 'payment_method_id' => 1, 'paid_at' => '2017-01-25']);

// Was the request successful?
if ($fiapi->getHttpStatus() == 200)
{
    // It was successful, and here's the new record in case we need to do anything else with it.
    $payment = $fiapi->getResponse();

    var_dump($payment);
}
else
{
    // It was not successful. Let's check the messages to see what went wrong.
    $errors = $fiapi->getResponse();

    var_dump($errors);
}