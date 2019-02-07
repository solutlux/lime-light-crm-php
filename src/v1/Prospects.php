<?php


namespace KevinEm\LimeLightCRM\v1;

use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMTransactionException;


/**
 * Class Prospects
 * @package KevinEm/LimeLightCRM/v1
 */
class Prospects
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
    public function newProspect(array $data)
    {
        return $this->makeRequest('new_prospect', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function prospectFind(array $data)
    {
        return $this->makeRequest('prospect_find', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function prospectUpdate(array $data)
    {
        return $this->makeRequest('prospect_update', $data);
    }

    /**
     * @param $prospectId
     * @return array
     * @throws \KevinEm\LimeLightCRM\v1\LimeLightCRMTransactionException
     */
    public function prospectView($prospectId)
    {
        return $this->makeRequest('prospect_view', ['prospect_id' => $prospectId]);
    }

}