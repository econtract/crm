<?php namespace Econtract\Crm\ServiceProviders;


class ReferralLeadServiceProvider extends BaseServiceProvider {

    public function createReferralLead($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/referrals' )
            ->withData( $this->addCrmApiKey( $this->addDefaultAttributes( $attributes ) ) )
            ->post();
    }

}