<?php namespace Econtract\AanbiedersCrm;


use Econtract\AanbiedersCrm\ServiceProviders\AddressServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\ClientServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\RecommendationServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\ContractServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\OrderServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\CallMeBackLeadServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\ClickOutLeadServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\ReferralLeadServiceProvider;
use Econtract\AanbiedersCrm\Traits\AddressTrait;
use Econtract\AanbiedersCrm\Traits\ClientTrait;
use Econtract\AanbiedersCrm\Traits\RecommendationTrait;
use Econtract\AanbiedersCrm\Traits\ContractTrait;
use Econtract\AanbiedersCrm\Traits\OrderTrait;
use Econtract\AanbiedersCrm\Traits\CallMeBackLeadTrait;
use Econtract\AanbiedersCrm\Traits\ClickOutLeadTrait;
use Econtract\AanbiedersCrm\Traits\ReferralLeadTrait;

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


    public function __construct($productServiceProvider = null, $supplierServiceProvider = null, $apiComparisonServiceProvider = null, $optionServiceProvider = null, $affiliateServiceProvider = null, $promotionServiceProvider = null, $addressServiceProvider = null, $clientServiceProvider = null, $recommendationServiceProvider = null, $contractServiceProvider = null, $orderServiceProvider = null, $callMeBackLeadServiceProvider = null, $clickOutLeadServiceProvider = null, $referralLeadServiceProvider = null)
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

}