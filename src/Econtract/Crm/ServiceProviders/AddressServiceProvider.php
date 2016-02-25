<?php namespace Econtract\Crm\ServiceProviders;


class AddressServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);

        $this->defaults = array(
            'street'        => '',
            'nr'            => '',
            'box'           => '',
            'postal_code'   => '',
            'city'          => '',
            'country'       => '',
            'client_id'     => 0,
        );
    }


    /**
     * Submit a GET request to recover address information for a specific $id to the CRM API
     * @param       integer $id             ID of the address to be recovered
     * @return      mixed
     */
    public function getAddress($id)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/addresses/'. $id )
            ->withData( $this->addCrmApiKey() )
            ->get();
    }

    /**
     * Submit a POST request to create a new address to the CRM API
     * @param       array $attributes       Data array containing all the address attributes
     * @return      mixed
     */
    public function createAddress($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/addresses' )
            ->withData( $this->addCrmApiKey( $this->addDefaultAttributes( $attributes ) ) )
            ->post();
    }

    /**
     * Submit a POST request to update the address information for address with $id to the CRM API
     * @param       integer $id             ID of the address to be recovered
     * @param       array $attributes       Data array containing all the address attributes
     * @return      mixed
     */
    public function updateAddress($id, $attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/addresses/'. $id )
            ->withData( $this->addCrmApiKey( $this->filterImmutableAttributes( $attributes ) ) )
            ->post();
    }

}