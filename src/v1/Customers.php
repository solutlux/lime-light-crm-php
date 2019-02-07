<?php


namespace KevinEm\LimeLightCRM\v1;

use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMTransactionException;


/**
 * Class Customers
 * @package KevinEm/LimeLightCRM/v1
 */
class Customers
{

    /**
     * @var apiClient
     */
    protected $apiClient;

    /**
     * Api Client constructor.
     * @param LimeLightCRM $apiClient
     */
    public function __construct(LimeLightCRM $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * @return array
     * @throws \KevinEm\LimeLightCRM\v1\LimeLightCRMTransactionException
     */
    public function makeRequest($method, $data)
    {
        return $this->apiClient->makeRequest($method, $data, 'POST');
    }

    /**
     * @param array $data
     * @return array
     * @throws \KevinEm\LimeLightCRM\v1\LimeLightCRMTransactionException
     */
    public function customerFind(array $data)
    {
        return $this->makeRequest('customer_find', $data);
    }

    /**
     * @param array $data
     * @return array
     * @throws \KevinEm\LimeLightCRM\v1\LimeLightCRMTransactionException
     */
    public function customerFindActiveProduct(array $data)
    {
        return $this->makeRequest('customer_find_active_product', $data);
    }

    /**
     * @param $customerId
     * @return array
     * @throws \KevinEm\LimeLightCRM\v1\LimeLightCRMTransactionException
     */
    public function customerView($customerId)
    {
        return $this->makeRequest('customer_view', ['customer_id' => $customerId]);
    }

}