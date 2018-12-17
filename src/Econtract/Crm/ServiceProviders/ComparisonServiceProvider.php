<?php namespace Econtract\Crm\ServiceProviders;


class ComparisonServiceProvider extends BaseServiceProvider
{
    public function getDefaultUsages($data)
    {
        $data = array_merge($data, $this->addCrmApiKey());
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/usages/')
            ->withData( $data )
            ->get();
    }

}