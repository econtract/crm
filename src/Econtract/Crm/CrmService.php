<?php namespace Econtract\Crm;


use Econtract\Crm\ServiceProviders\AddressServiceProvider;
use Econtract\Crm\ServiceProviders\ClientServiceProvider;
use Econtract\Crm\ServiceProviders\ComparisonServiceProvider;
use Econtract\Crm\ServiceProviders\RecommendationServiceProvider;
use Econtract\Crm\ServiceProviders\ContractServiceProvider;
use Econtract\Crm\ServiceProviders\OrderServiceProvider;
use Econtract\Crm\ServiceProviders\SupplierServiceProvider;
use Econtract\Crm\ServiceProviders\LeadServiceProvider;
use Econtract\Crm\Traits\AddressTrait;
use Econtract\Crm\Traits\ClientTrait;
use Econtract\Crm\Traits\ComparisonTrait;
use Econtract\Crm\Traits\RecommendationTrait;
use Econtract\Crm\Traits\ContractTrait;
use Econtract\Crm\Traits\OrderTrait;
use Econtract\Crm\Traits\LeadTrait;

class CrmService {

    use AddressTrait, ClientTrait, RecommendationTrait, ContractTrait, OrderTrait, LeadTrait, ComparisonTrait;


    /** @var AddressServiceProvider $addressServiceProvider */
    protected $addressServiceProvider = null;

    /** @var ComparisonServiceProvider $comparisonServiceProvider */
    protected $comparisonServiceProvider = null;

    /** @var ClientServiceProvider $clientServiceProvider */
    protected $clientServiceProvider = null;

    /** @var RecommendationServiceProvider $recommendationServiceProvider */
    protected $recommendationServiceProvider = null;

    /** @var ContractServiceProvider $contractServiceProvider */
    protected $contractServiceProvider = null;

    /** @var OrderServiceProvider $orderServiceProvider */
    protected $orderServiceProvider = null;

    /** @var SupplierServiceProvider $supplierServiceProvider */
    protected $supplierServiceProvider = null;

    /** @var LeadServiceProvider $leadServiceProvider */
    protected $leadServiceProvider = null;


    public function __construct(
        $addressServiceProvider = null,
        $clientServiceProvider = null,
        $comparisonServiceProvider = null,
        $recommendationServiceProvider = null,
        $contractServiceProvider = null,
        $orderServiceProvider = null,
        $supplierServiceProvider = null,
        $leadServiceProvider = null
    ) {
        $this->addressServiceProvider = $addressServiceProvider;
        $this->comparisonServiceProvider = $comparisonServiceProvider;
        $this->clientServiceProvider = $clientServiceProvider;
        $this->recommendationServiceProvider = $recommendationServiceProvider;
        $this->contractServiceProvider = $contractServiceProvider;
        $this->orderServiceProvider = $orderServiceProvider;
        $this->supplierServiceProvider = $supplierServiceProvider;
        $this->leadServiceProvider = $leadServiceProvider;
    }


    /**
     * @param string $response
     * @return \stdClass
     */
    protected function returnCrmResponse($response)
    {
        return \json_decode($response);
    }

}
