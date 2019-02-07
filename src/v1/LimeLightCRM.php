<?php


namespace KevinEm\LimeLightCRM\v1;

use GuzzleHttp\Client;
use KevinEm\v1\Order\Order;

/**
 * Class ApiClient
 * @package KevinEm\LimeLightCRM\v1
 */
class LimeLightCRM
{

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var Order
     */
    protected $order;

    /**
     * LimeLightCRM constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->baseUrl = $options['base_url'];

        $this->username = $options['username'];

        $this->password = $options['password'];

        $this->setHttpClient(new Client());

    }

    /**
     * make request
     * @param $method
     * @param $data
     * @param $type
     * @return array
     * @throws LimeLightCRMTransactionException
     */
    public function makeRequest($method, $data, $type)
    {
        $authParams = $this->getAuth();

        $formParams = $this->buildFormParams($data);

        $url = $this->getUrl($method);

        $res = $this->getResponse($type, $url, array_merge($authParams, $formParams));

        $parsed = $this->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @return array
     */
    public function getAuth()
    {
        return [
            'auth' => [$this->username,$this->password],
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    public function buildFormParams($data = false)
    {
        return ($data) ? ['form_params' => $data] : [];
    }

    /**
     * @return string
     */
    public function getUrl($method)
    {
        return $this->getBaseUrl() . '/api/v1/' . $method;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param $method
     * @param $uri
     * @param array $options
     * @return mixed
     */
    public function getResponse($method, $uri, array $options = [])
    {
        $res = $this->getHttpClient()->request($method, $uri, $options);

        return $res->getBody()->getContents();
    }

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param Client $httpClient
     * @return $this
     */
    public function setHttpClient(Client $httpClient)
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * Parse response returned by LimeLightCRM into an array
     *
     * @param $response
     * @return array
     */
    public function parseResponse($response)
    {
        $array = [];

        /*$exploded = explode('&', $response);

        foreach ($exploded as $explode) {
            $line = explode('=', $explode);

            if (isset($line[1])) {
                $array[$line[0]] = urldecode($line[1]);
            } else {
                $array[] = $explode;
            }
        }*/

        $array = json_decode($response, true);

        return $array;
    }

    /**
     * @param array $response
     * @throws LimeLightCRMTransactionException
     */
    public function checkResponse(array $response)
    {
        /*$exception = null;

        if (isset($response['response_code'])) {
            $responses = explode(',', $response['response_code']);

            foreach ($responses as $code) {
                if (!in_array($code, [100])) {
                    $exception = new LimeLightCRMTransactionException($code, $exception, $response);
                }
            }
        }

        if (isset($exception)) {
            throw $exception;
        }*/
    }

    /**
     * @return Credentials
     */
    public function credentials()
    {
        return new Credentials($this);
    }

    /**
     * @return Products
     */
    public function products()
    {
        return new Products($this);
    }

    /**
     * @return Shippings
     */
    public function shippings()
    {
        return new Shippings($this);
    }

    /**
     * @return Campaigns
     */
    public function campaigns()
    {
        return new Campaigns($this);
    }

    /**
     * @return Prospects
     */
    public function prospects()
    {
        return new Prospects($this);
    }

    /**
     * @return Payments
     */
    public function payments()
    {
        return new Payments($this);
    }

    /**
     * @return Orders
     */
    public function orders()
    {
        return new Orders($this);
    }

    /**
     * @return Customers
     */
    public function customers()
    {
        return new Customers($this);
    }
}