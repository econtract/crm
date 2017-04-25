<?php namespace Econtract\Crm\ServiceProviders;


class ContractServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);

        $this->guards = array(
            'status',
        );
    }


    /**
     * Submit a GET request to recover contract information for a specific $id to the CRM API
     * @param       integer $id             ID of the contract to be recovered
     * @return      mixed
     */
    public function getContract($id)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/contracts/'. $id )
            ->withData( $this->addCrmApiKey() )
            ->get();
    }

}