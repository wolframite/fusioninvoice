<?php

// Require the API class.
require __DIR__ . '/../fiapi.php';

// Require our API config variables.
require 'apiconfig.php';

// Create an instance of the API client library.
$fiapi = new fiapi($baseURL, $apiPublicKey, $apiSecretKey);

// Issue the command to create the new invoice.
// Required fields: client_name, company_profile_id, invoice_date (YYYY-MM-DD format).
// Any other fields from the invoices table can optionally be included.
$fiapi->createInvoice(['client_name' => 'New Client', 'company_profile_id' => 1, 'invoice_date' => '2017-01-20']);

// Was the request successful?
if ($fiapi->getHttpStatus() == 200)
{
    // It was successful, so let's get the new invoice that was just created.
    $invoice = $fiapi->getResponse();

    // Now let's add some items to that new invoice.
    $fiapi->addInvoiceItem([
        'invoice_id'  => $invoice['id'],
        'name'        => 'Item 1',
        'description' => 'Item 1 description',
        'quantity'    => 1,
        'price'       => 200,
    ]);

    $fiapi->addInvoiceItem([
        'invoice_id'  => $invoice['id'],
        'name'        => 'Item 2',
        'description' => 'Item 2 description',
        'quantity'    => 1,
        'price'       => 300,
    ]);

    $fiapi->addInvoiceItem([
        'invoice_id'  => $invoice['id'],
        'name'        => 'Item 3',
        'description' => 'Item 3 description',
        'quantity'    => 1,
        'price'       => 400,
    ]);

    // Technically we'd check for a successful status after adding each item, but for brevity's sake...
    if ($fiapi->getHttpStatus() == 200)
    {
        // It was successful, so let's retrieve the updated invoice, including the added items.
        $fiapi->showInvoice(['id' => $invoice['id']]);

        $invoice = $fiapi->getResponse();

        var_dump($invoice);
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