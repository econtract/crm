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

    /**
     * Submit a POST request to create a new contract to the CRM API
     * @param       array $attributes       Data array containing all the contract attributes
     * @return      mixed
     */
    public function createContract($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/contracts' )
            ->withData( $this->addCrmApiKey( $attributes ) )
            ->post();
    }

    /**
     * Submit a POST request to create a new contract to the CRM API
     * @param       array $attributes       Data array containing all the contract attributes
     * @return      mixed
     */
    public function updateContract($id, $attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/contracts/'. $id )
            ->withData( $this->addCrmApiKey( $this->filterImmutableAttributes( $attributes ) ) )
            ->post();
    }

}