<?php namespace Econtract\Crm\Traits;


use Econtract\Crm\ServiceProviders\LeadServiceProvider;

trait LeadTrait {

    /**
     * @param array $attributes
     * @return \stdClass
     */
    public function createCallMeBackLead($attributes)
    {
        return $this->returnCrmResponse(
            $this->getLeadServiceProvider()->createCallMeBackLead($attributes)
        );
    }

    /**
     * @param array $attributes
     * @return \stdClass
     */
    public function createClickOutLead($attributes)
    {
        return $this->returnCrmResponse(
            $this->getLeadServiceProvider()->createClickOutLead($attributes)
        );
    }

    /**
     * @param array $attributes
     * @return \stdClass
     */
    public function createKobiLead($attributes)
    {
        return $this->returnCrmResponse(
            $this->getLeadServiceProvider()->createKobiLead($attributes)
        );
    }

    /**
     * @param array $attributes
     * @return \stdClass
     */
    public function createReferralLead($attributes)
    {
        return $this->returnCrmResponse(
            $this->getLeadServiceProvider()->createReferralLead($attributes)
        );
    }


    /**
     * @return LeadServiceProvider
     */
    protected function getLeadServiceProvider()
    {
        if( is_null($this->leadServiceProvider) ) {
            $this->leadServiceProvider = new LeadServiceProvider();
        }

        return $this->leadServiceProvider;
    }

}