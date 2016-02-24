<?php namespace Econtract\Crm\ServiceProviders;


class ContractServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);

        $this->defaults = array(
            'product_id'            => 0,
            'producttype_id'        => 0,
            'supplier_id'           => 0,
            'address_id'            => 0,
            'invoice_address_id'    => 0,
            'customer_refnr'        => '',
            'order_refnr'           => '',
            'contract_refnr'        => '',
            'start_date'            => date('Y-m-d'),
            'end_date'              => date('Y-m-d', strtotime('+ 1 year')),
            'duration'              => 0,
            'payment_method'        => '',
            'monthly_fee'           => 0,
            'monthly_fee_promo'     => 0,
            'status'                => 0
        );

        $this->guards = array(
            'status'
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
            ->to( $this->crmBaseUrl .'/contracts/'. $id )
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
            ->to( $this->crmBaseUrl .'/contracts' )
            ->withData( $this->addCrmApiKey( $this->addDefaultAttributes( $attributes ) ) )
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
            ->to( $this->crmBaseUrl .'/contracts/'. $id )
            ->withData( $this->addCrmApiKey( $this->filterImmutableAttributes( $attributes ) ) )
            ->post();
    }

}