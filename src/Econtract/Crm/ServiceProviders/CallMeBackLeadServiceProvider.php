<?php namespace Econtract\Crm\ServiceProviders;


class CallMeBackLeadServiceProvider extends BaseServiceProvider {

    public function createCallMeBackLead($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/leads' )
            ->withData( $this->addDefaultAttributes( $attributes ) )
            ->post();
    }

}