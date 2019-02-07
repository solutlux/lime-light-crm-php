<?php


namespace KevinEm\LimeLightCRM\v1;

use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMTransactionException;


/**
 * Class Shippings
 * @package KevinEm/LimeLightCRM/v1
 */
class Shippings
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
     * @param $orderId
     * @return array
     * @throws \KevinEm\LimeLightCRM\v1\LimeLightCRMTransactionException
     */
    public function repostToFulfillment($orderId)
    {
        return $this->makeRequest('repost_to_fulfillment', ['order_id' => $orderId]);
    }

    /**
     * @param array $data
     * @return array
     */
    public function shippingMethodFind(array $data)
    {
        return $this->makeRequest('shipping_method_find', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function shippingMethodView($shippingId)
    {
        return $this->makeRequest('shipping_method_view', ['shipping_id' => $shippingId]);
    }

}