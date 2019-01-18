<?php namespace Econtract\Crm\ServiceProviders;


class LeadServiceProvider extends BaseServiceProvider {

    public function createClickOutLead($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/leads/clickOut' )
            ->returnResponseObject()
            ->withData( $this->addCrmApiKey( $attributes ) )
            ->post();
    }

    public function createReferralLead($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/referrals' )
            ->returnResponseObject()
            ->withData( $this->addCrmApiKey( $attributes ) )
            ->post();
    }

    public function createLead($leadType, $attributes = array())
    {
        $attributes[ 'lead_type' ] = $leadType;

        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/leads' )
            ->returnResponseObject()
            ->withData( $this->addCrmApiKey( $attributes ) )
            ->post();
    }

}