<?php

/**
 * This file is part of FusionInvoice.
 *
 * (c) FusionInvoice, LLC <jessedterry@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class fiapi {

    /**
     * The API public key.
     *
     * @var string
     */
    protected $apiPublicKey;

    /**
     * The API secret key.
     *
     * @var string
     */
    protected $apiSecretKey;

    /**
     * The base URL to the FI installation. Must not include trailing slash.
     *
     * @var string
     */
    protected $baseURL;

    /**
     * Array used to store the content for signature and API request.
     *
     * @var array
     */
    protected $content;

    /**
     * The API endpoint.
     *
     * @var string
     */
    protected $endpoint;

    /**
     * The HTTP status response code.
     *
     * @var string
     */
    protected $httpStatus;

    /**
     * The response in JSON format.
     *
     * @var string
     */
    protected $response;

    /**
     * The request signature.
     *
     * @var string
     */
    protected $signature;

    /**
     * @param string $baseURL The URL of the FI installation (without trailing slash).
     * @param string $apiPublicKey The API public key.
     * @param string $apiSecretKey The API secret key.
     */
    public function __construct($baseURL, $apiPublicKey, $apiSecretKey)
    {
        $this->baseURL      = $baseURL;
        $this->apiPublicKey = $apiPublicKey;
        $this->apiSecretKey = $apiSecretKey;
    }

    /**
     * Retrieves the list of clients from the API.
     *
     * @param array $params
     */
    public function listClients($params = ['page' => 1])
    {
        $this->setEndpoint('/api/clients/list');

        $this->prepareContent();

        $this->generateSignature();

        $this->sendRequest(http_build_query($params));
    }

    /**
     * Retrieve a single client record
     *
     * @param array $content
     */
    public function showClient($content = [])
    {
        $this->setEndpoint('/api/clients/show');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    /**
     * Creates a new client through the API.
     *
     * @param array $content Array containing key=>value pairs describing the client record.
     */
    public function createClient($content)
    {
        $this->setEndpoint('/api/clients/create');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    /**
     * Updates an existing client through the API.
     *
     * @param array $content Array containing key=>value pairs describing the client record.
     */
    public function updateClient($content)
    {
        $this->setEndpoint('/api/clients/update');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    /**
     * Deletes an existing client through the API.
     *
     * @param array $content Array containing key=>value pair with the id of the client record to delete.
     */
    public function deleteClient($content)
    {
        $this->setEndpoint('/api/clients/delete');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    /**
     * Retrieves the list of invoices from the API.
     *
     * @param array $params
     */
    public function listInvoices($params = ['page' => 1, 'status' => null])
    {
        $this->setEndpoint('/api/invoices/list');

        $this->prepareContent();

        $this->generateSignature();

        $this->sendRequest(http_build_query($params));
    }

    public function showInvoice($content)
    {
        $this->setEndpoint('/api/invoices/show');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    public function createInvoice($content)
    {
        $this->setEndpoint('/api/invoices/create');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    public function addInvoiceItem($content)
    {
        $this->setEndpoint('/api/invoices/items/add');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    /**
     * Deletes an existing invoice through the API.
     *
     * @param array $content Array containing key=>value pair with the id of the invoice record to delete.
     */
    public function deleteInvoice($content)
    {
        $this->setEndpoint('/api/invoices/delete');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    /**
     * Retrieves the list of quotes from the API.
     *
     * @param array $params
     */
    public function listQuotes($params = ['page' => 1, 'status' => null])
    {
        $this->setEndpoint('/api/quotes/list');

        $this->prepareContent();

        $this->generateSignature();

        $this->sendRequest(http_build_query($params));
    }

    public function showQuote($content)
    {
        $this->setEndpoint('/api/quotes/show');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    public function createQuote($content)
    {
        $this->setEndpoint('/api/quotes/create');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    public function addQuoteItem($content)
    {
        $this->setEndpoint('/api/quotes/items/add');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    /**
     * Deletes an existing quote through the API.
     *
     * @param array $content Array containing key=>value pair with the id of the quote record to delete.
     */
    public function deleteQuote($content)
    {
        $this->setEndpoint('/api/quotes/delete');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    /**
     * Retrieves the list of payments from the API.
     *
     * @param array $params
     */
    public function listPayments($params = ['page' => 1])
    {
        $this->setEndpoint('/api/payments/list');

        $this->prepareContent();

        $this->generateSignature();

        $this->sendRequest(http_build_query($params));
    }

    public function showPayment($content)
    {
        $this->setEndpoint('/api/payments/show');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    public function createPayment($content)
    {
        $this->setEndpoint('/api/payments/create');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    /**
     * Deletes an existing payment through the API.
     *
     * @param array $content Array containing key=>value pair with the id of the payment record to delete.
     */
    public function deletePayment($content)
    {
        $this->setEndpoint('/api/payments/delete');

        $this->prepareContent($content);

        $this->generateSignature();

        $this->sendRequest();
    }

    /**
     * Returns the HTTP status response code.
     *
     * @return string
     */
    public function getHttpStatus()
    {
        return $this->httpStatus;
    }

    /**
     * Returns the response
     *
     * @param bool|true $returnArray
     * @return mixed
     */
    public function getResponse($returnArray = true)
    {
        return json_decode($this->response, $returnArray);
    }

    /**
     * Sets the API endpoint.
     *
     * @param string $endpoint
     */
    protected function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * Performs required actions to $content array.
     *
     * @param array $content
     */
    protected function prepareContent($content = [])
    {
        $this->content = $content;

        $this->content['endpoint']  = $this->endpoint;
        $this->content['timestamp'] = time();

        foreach ($this->content as $key => $val)
        {
            $this->content[$key] = (string)$val;
        }

        ksort($this->content);
    }

    /**
     * Generate the request signature.
     */
    protected function generateSignature()
    {
        $this->signature = hash_hmac('sha256', json_encode($this->content), $this->apiSecretKey);
    }

    /**
     * Send the request to the API.
     *
     * @param string $optionalParams
     */
    protected function sendRequest($optionalParams = '')
    {
        $ch = curl_init($this->baseURL . $this->content['endpoint'] . '?key=' . $this->apiPublicKey . '&signature=' . $this->signature . '&' . $optionalParams);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->content);
        $this->response     = curl_exec($ch);
        $this->httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    }

}