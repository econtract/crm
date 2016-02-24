<?php namespace Econtract\AanbiedersCrm\ServiceProviders;


class ClickOutLeadServiceProvider extends BaseServiceProvider {

    public function createClickOutLead($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/leads/clickOut' )
            ->withData( $this->addDefaultAttributes( $attributes ) )
            ->post();
    }

}