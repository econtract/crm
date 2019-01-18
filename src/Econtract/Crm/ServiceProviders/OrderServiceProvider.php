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
            ->returnResponseObject()
            ->withData( $this->addCrmApiKey( $filters ) )
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
            ->returnResponseObject()
            ->withData( $this->addCrmApiKey( $attributes ) )
            ->post();
    }
    
    /**
    * GET latest single product bt product_id or product_type
    *
    * product_type - Product type (electricity, gas, dualfuel_pack, mobile, etc.)
    */
    public function getLatestOrderByProduct(array $filters = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/orders/latestByProduct' )
            ->returnResponseObject()
            ->withData( $this->addCrmApiKey( $filters ) )
            ->get();
    }

}
