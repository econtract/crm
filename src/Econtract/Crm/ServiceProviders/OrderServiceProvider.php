<?php namespace Econtract\Crm\ServiceProviders;


class OrderServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);

        $this->guards = array(
            'status',
        );
    }


    /**
     * Fetch latest orders
     *
     * Available filters are:
     *  limit - limits number of returned items (min: 1, max: 100, default: 10)
     *  age - order maximum age in days (min: 1)
     *  address_zipcode - Zipcode on which order was placed
     *  client_language - Client language in ISO-639-1 format (nl or fr)
     *  product_type - Product type (electricity, gas, dualfuel_pack, mobile, etc.)
     *  affiliate_id - An affiliate identifier (integer)
     *
     * @param  array $filters One or all of available filters
     * @return      mixed
     */
    public function getLatestOrders(array $filters = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/orders/latest' )
            ->withData( $this->addCrmApiKey( $filters ) )
            ->get();
    }

    /**
     * Submit a GET request to recover order information for a specific $id to the CRM API
     * @param       integer $id             ID of the order to be recovered
     * @return      mixed
     */
    public function getOrder($id)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/orders/'. $id )
            ->withData( $this->addCrmApiKey() )
            ->get();
    }

    /**
     * Submit a POST request to create a new order to the CRM API
     * @param       array $attributes       Data array containing all the order attributes
     * @return      mixed
     */
    public function createOrder($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/orders' )
            ->withData( $this->addCrmApiKey( $attributes ) )
            ->post();
    }

    /**
     * Submit a POST request to create a new order (including client, addresses and contract) to the CRM API
     * @param       array $attributes       Data array containing all the client, address, invoice address, order and contract attributes
     * @return      mixed
     */
    public function createFullOrder($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/orders/full' )
            ->withData( $this->addCrmApiKey( $attributes ) )
            ->post();
    }

    /**
     * Submit a POST request to create a new order to the CRM API
     * @param       array $attributes       Data array containing all the order attributes
     * @return      mixed
     */
    public function updateOrder($id, $attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/orders/'. $id )
            ->withData( $this->addCrmApiKey( $this->filterImmutableAttributes( $attributes ) ) )
            ->post();
    }

}