<?php namespace Econtract\Crm\ServiceProviders;


class ClickOutLeadServiceProvider extends BaseServiceProvider {

    public function createClickOutLead($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/leads/clickOut' )
            ->withData( $this->addCrmApiKey( $this->addDefaultAttributes( $attributes ) ) )
            ->post();
    }

}