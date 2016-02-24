<?php namespace Econtract\Crm;


use Econtract\Crm\ServiceProviders\AddressServiceProvider;
use Econtract\Crm\ServiceProviders\ClientServiceProvider;
use Econtract\Crm\ServiceProviders\RecommendationServiceProvider;
use Econtract\Crm\ServiceProviders\ContractServiceProvider;
use Econtract\Crm\ServiceProviders\OrderServiceProvider;
use Econtract\Crm\ServiceProviders\CallMeBackLeadServiceProvider;
use Econtract\Crm\ServiceProviders\ClickOutLeadServiceProvider;
use Econtract\Crm\ServiceProviders\ReferralLeadServiceProvider;
use Econtract\Crm\Traits\AddressTrait;
use Econtract\Crm\Traits\ClientTrait;
use Econtract\Crm\Traits\RecommendationTrait;
use Econtract\Crm\Traits\ContractTrait;
use Econtract\Crm\Traits\OrderTrait;
use Econtract\Crm\Traits\CallMeBackLeadTrait;
use Econtract\Crm\Traits\ClickOutLeadTrait;
use Econtract\Crm\Traits\ReferralLeadTrait;

class CrmService {

    use AddressTrait, ClientTrait, RecommendationTrait, ContractTrait, OrderTrait;
    use CallMeBackLeadTrait, ClickOutLeadTrait, ReferralLeadTrait;


    /** @var AddressServiceProvider $addressServiceProvider  */
    protected $addressServiceProvider = null;

    /** @var ClientServiceProvider $clientServiceProvider  */
    protected $clientServiceProvider = null;

    /** @var RecommendationServiceProvider $recommendationServiceProvider  */
    protected $recommendationServiceProvider = null;

    /** @var ContractServiceProvider $contractServiceProvider  */
    protected $contractServiceProvider = null;

    /** @var OrderServiceProvider $orderServiceProvider  */
    protected $orderServiceProvider = null;

    /** @var CallMeBackLeadServiceProvider $callMeBackLeadServiceProvider  */
    protected $callMeBackLeadServiceProvider = null;

    /** @var ClickOutLeadServiceProvider $clickOutLeadServiceProvider  */
    protected $clickOutLeadServiceProvider = null;

    /** @var ReferralLeadServiceProvider $referralLeadServiceProvider  */
    protected $referralLeadServiceProvider = null;


    public function __construct($addressServiceProvider = null, $clientServiceProvider = null, $recommendationServiceProvider = null, $contractServiceProvider = null, $orderServiceProvider = null, $callMeBackLeadServiceProvider = null, $clickOutLeadServiceProvider = null, $referralLeadServiceProvider = null)
    {
        $this->addressServiceProvider = $addressServiceProvider;
        $this->clientServiceProvider = $clientServiceProvider;
        $this->recommendationServiceProvider = $recommendationServiceProvider;
        $this->contractServiceProvider = $contractServiceProvider;
        $this->orderServiceProvider = $orderServiceProvider;

        $this->callMeBackLeadServiceProvider = $callMeBackLeadServiceProvider;
        $this->clickOutLeadServiceProvider = $clickOutLeadServiceProvider;
        $this->referralLeadServiceProvider = $referralLeadServiceProvider;
    }


    /**
     * @param string $response
     * @return \stdClass
     */
    protected function returnCrmResponse($response)
    {
        return json_decode( $response );
    }

}