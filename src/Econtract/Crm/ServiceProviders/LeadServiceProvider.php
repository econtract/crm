<?php namespace Econtract\Crm\ServiceProviders;


class LeadServiceProvider extends BaseServiceProvider {

    public function createCallMeBackLead($attributes = array())
    {
        $attributes[ 'lead_type' ] = 'call_me_back';

        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/leads' )
            ->withData( $this->addCrmApiKey( $this->addDefaultAttributes( $attributes ) ) )
            ->post();
    }

    public function createClickOutLead($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/leads/clickOut' )
            ->withData( $this->addCrmApiKey( $this->addDefaultAttributes( $attributes ) ) )
            ->post();
    }

    public function createReferralLead($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/referrals' )
            ->withData( $this->addCrmApiKey( $this->addDefaultAttributes( $attributes ) ) )
            ->post();
    }

}