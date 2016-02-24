<?php namespace Econtract\Crm\Traits;


use Econtract\Crm\ServiceProviders\ContractServiceProvider;
use Econtract\Crm\Exceptions\AanbiedersApiException;

trait ContractTrait {

    /**
     * @param int $id
     * @return \stdClass
     */
    public function getContract($id)
    {
        return $this->returnCrmResponse(
            $this->getContractServiceProvider()->getContract($id)
        );
    }

    /**
     * @param array $attributes
     * @return \stdClass
     */
    public function createContract($attributes)
    {
        return $this->returnCrmResponse(
            $this->getContractServiceProvider()->createContract($attributes)
        );
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return \stdClass
     */
    public function updateContract($id, $attributes)
    {
        return $this->returnCrmResponse(
            $this->getContractServiceProvider()->updateContract($id, $attributes)
        );
    }


    /**
     * @return ContractServiceProvider
     */
    protected function getContractServiceProvider()
    {
        if( is_null($this->contractServiceProvider) ) {
            $this->contractServiceProvider = new ContractServiceProvider();
        }

        return $this->contractServiceProvider;
    }

}