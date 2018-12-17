<?php namespace Econtract\Crm\Traits;


use Econtract\Crm\ServiceProviders\ComparisonServiceProvider;

trait ComparisonTrait {

    public function getDefaultUsages($params)
    {
        return $this->returnCrmResponse(
            $this->getComparisonServiceProvider()->getDefaultUsages($params)
        );
    }

    /**
     * @return ComparisonServiceProvider
     */
    protected function getComparisonServiceProvider()
    {
        if( is_null($this->comparisonServiceProvider) ) {
            $this->comparisonServiceProvider = new ComparisonServiceProvider();
        }

        return $this->comparisonServiceProvider;
    }

}
