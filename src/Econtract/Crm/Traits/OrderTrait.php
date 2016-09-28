<?php namespace Econtract\Crm\Traits;


use Econtract\Crm\ServiceProviders\OrderServiceProvider;
use Econtract\Crm\Exceptions\AanbiedersApiException;

trait OrderTrait {

    /**
     * @param array $filters
     * @return \stdClass
     */
    public function getLatestOrders(array $filters = [])
    {
        return $this->returnCrmResponse(
            $this->getOrderServiceProvider()->getLatestOrders($filters)
        );
    }

    /**
     * @param int $id
     * @return \stdClass
     */
    public function getOrder($id)
    {
        return $this->returnCrmResponse(
            $this->getOrderServiceProvider()->getOrder($id)
        );
    }

    /**
     * @param array $attributes
     * @return \stdClass
     */
    public function createOrder($attributes)
    {
        return $this->returnCrmResponse(
            $this->getOrderServiceProvider()->createOrder($attributes)
        );
    }

    /**
     * @param array $attributes
     * @return \stdClass
     */
    public function createFullOrder($attributes)
    {
        return $this->returnCrmResponse(
            $this->getOrderServiceProvider()->createFullOrder($attributes)
        );
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return \stdClass
     */
    public function updateOrder($id, $attributes)
    {
        return $this->returnCrmResponse(
            $this->getOrderServiceProvider()->updateOrder($id, $attributes)
        );
    }


    /**
     * @return OrderServiceProvider
     */
    protected function getOrderServiceProvider()
    {
        if( is_null($this->orderServiceProvider) ) {
            $this->orderServiceProvider = new OrderServiceProvider();
        }

        return $this->orderServiceProvider;
    }

}