<?php namespace Econtract\Crm\Traits;


use Econtract\Crm\ServiceProviders\SupplierServiceProvider;

trait SupplierTrait {

    /**
     * @param array $attributes
     * @return \stdClass
     */
    public function getSupplierRating($attributes)
    {
        return $this->returnCrmResponse(
            $this->getSupplierServiceProvider()->getSupplierRating( $attributes )
        );
    }


    /**
     * @return SupplierServiceProvider
     */
    protected function getSupplierServiceProvider()
    {
        if( is_null($this->supplierServiceProvider) ) {
            $this->supplierServiceProvider = new SupplierServiceProvider();
        }

        return $this->supplierServiceProvider;
    }

}
