<?php namespace Econtract\Crm\Traits;


use Econtract\Crm\ServiceProviders\ContractServiceProvider;

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