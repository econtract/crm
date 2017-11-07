<?php namespace Econtract\Crm\Traits;


use Econtract\Crm\ServiceProviders\OrderServiceProvider;

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
     * @return OrderServiceProvider
     */
    protected function getOrderServiceProvider()
    {
        if( is_null($this->orderServiceProvider) ) {
            $this->orderServiceProvider = new OrderServiceProvider();
        }

        return $this->orderServiceProvider;
    }
    
    /**
     * @param array $filters
     * @return \stdClass
     */
    public function getLatestOrderByProduct(array $filters = [])
    {
        return $this->returnCrmResponse(
            $this->getOrderServiceProvider()->getLatestOrderByProduct($filters)
        );
    }

}
