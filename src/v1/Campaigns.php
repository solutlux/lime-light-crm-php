<?php


namespace KevinEm\LimeLightCRM\v1;

use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMTransactionException;


/**
 * Class Campaigns
 * @package KevinEm/LimeLightCRM/v1
 */
class Campaigns
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
    public function campaignFindActive()
    {
        return $this->makeRequest('campaign_find_active', [], 'POST');
    }

    /**
     * @param $campaignId
     * @return array
     * @throws \KevinEm\LimeLightCRM\v1\LimeLightCRMTransactionException
     */
    public function campaignView($campaignId)
    {
        return $this->makeRequest('campaign_view', ['campaign_id' => $campaignId]);
    }

}