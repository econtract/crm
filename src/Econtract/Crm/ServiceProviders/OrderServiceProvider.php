<?php namespace Econtract\Crm\ServiceProviders;


class OrderServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);

        $this->defaults = array(
            'client_id'                 => 0,
            'contract_id'               => 0,
            'order_nr'                  => '',
            'remarks'                   => '',
            'comparison_id'             => 0,
            'status'                    => 0,
            'cancellation_reason'       => 0,
            'sales_channel'             => '',
            'campaign_id'               => '',
            'affiliate_id'              => 0,
            'user_id'                   => 0,
            'fulfillment_status'        => 0,
            'billing_status'            => 0,
            'commission'                => 0
        );

        $this->guards = array(
            'status'
        );
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
            ->withData( $this->addCrmApiKey( $this->addDefaultAttributes( $attributes ) ) )
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
            ->withData( $this->addCrmApiKey( $this->addDefaultAttributes( $attributes ) ) )
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