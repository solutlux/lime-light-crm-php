<?php


namespace KevinEm\LimeLightCRM\v1;

use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMTransactionException;


/**
 * Class Payments
 * @package KevinEm/LimeLightCRM/v1
 */
class Payments
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
     */
    public function authorizePayment()
    {
        return $this->makeRequest('authorize_payment', []);
    }

    /**
     * @param array $gatewayIds
     * @return array
     * @throws \KevinEm\LimeLightCRM\v1\LimeLightCRMTransactionException
     */
    public function gatewayView(array $gatewayIds)
    {
        return $this->makeRequest('gateway_view', ['gateway_id' => $gatewayIds]);
    }

    /**
     * @param array $data
     * @return array
     */
    public function getAlternativeProvider(array $data)
    {
        return $this->makeRequest('get_alternative_provider', $data);
    }

    /**
     * @param $paymentRouterId
     * @return array
     * @throws \KevinEm\LimeLightCRM\v1\LimeLightCRMTransactionException
     */
    public function paymentRouterView($paymentRouterId)
    {
        return $this->makeRequest('payment_router_view', ['payment_router_id' => $paymentRouterId]);
    }

    /**
     * @param $orderId
     * @return array
     * @throws \KevinEm\LimeLightCRM\v1\LimeLightCRMTransactionException
     */
    public function threeDRedirect($orderId)
    {
        return $this->makeRequest('three_d_redirect', ['order_id' => $orderId]);
    }
}