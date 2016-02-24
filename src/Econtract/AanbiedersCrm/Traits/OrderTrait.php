<?php namespace Econtract\AanbiedersCrm\Traits;


use Econtract\AanbiedersCrm\ServiceProviders\OrderServiceProvider;
use Econtract\AanbiedersCrm\Exceptions\AanbiedersApiException;

trait OrderTrait {

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