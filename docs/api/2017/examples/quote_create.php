<?php

// Require the API class.
require __DIR__ . '/../fiapi.php';

// Require our API config variables.
require 'apiconfig.php';

// Create an instance of the API client library.
$fiapi = new fiapi($baseURL, $apiPublicKey, $apiSecretKey);

// Issue the command to create the new quote.
// Required fields: client_name, company_profile_id and quote_date (YYYY-MM-DD format).
// Any other fields from the quotes table can optionally be included.
$fiapi->createQuote(['client_name' => 'New Client', 'company_profile_id' => 1, 'quote_date' => '2017-01-20']);

// Was the request successful?
if ($fiapi->getHttpStatus() == 200)
{
    // It was successful, so let's get the new quote that was just created.
    $quote = $fiapi->getResponse();

    // Now let's add some items to that new quote.
    $fiapi->addQuoteItem([
        'quote_id'    => $quote['id'],
        'name'        => 'Item 1',
        'description' => 'Item 1 description',
        'quantity'    => 1,
        'price'       => 200,
    ]);

    $fiapi->addQuoteItem([
        'quote_id'    => $quote['id'],
        'name'        => 'Item 2',
        'description' => 'Item 2 description',
        'quantity'    => 1,
        'price'       => 300,
    ]);

    $fiapi->addQuoteItem([
        'quote_id'    => $quote['id'],
        'name'        => 'Item 3',
        'description' => 'Item 3 description',
        'quantity'    => 1,
        'price'       => 400,
    ]);

    // Technically we'd check for a successful status after adding each item, but for brevity's sake...
    if ($fiapi->getHttpStatus() == 200)
    {
        // It was successful, so let's retrieve the updated quote, including the added items.
        $fiapi->showQuote(['id' => $quote['id']]);

        $quote = $fiapi->getResponse();

        var_dump($quote);
    }
    else
    {
        // It was not successful. Let's check the messages to see what went wrong.
        $errors = $fiapi->getResponse();

        var_dump($errors);
    }
}
else
{
    // It was not successful. Let's check the messages to see what went wrong.
    $errors = $fiapi->getResponse();

    var_dump($errors);
}