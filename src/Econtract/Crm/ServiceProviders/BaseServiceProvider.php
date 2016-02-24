<?php namespace Econtract\Crm\ServiceProviders;


use Ixudra\Curl\CurlService;

class BaseServiceProvider {

    protected $apiClient = null;

    protected $curlService = null;

    protected $crmBaseUrl = null;

    protected $defaults = array();

    protected $guards = array();


    public function __construct($crmBaseUrl = null)
    {
        if( isset($_SERVER[ 'AB_CRM_URL' ]) && is_null($crmBaseUrl) ) {
            $crmBaseUrl = $_SERVER[ 'AB_CRM_URL' ];
        }

        if( isset($_SERVER[ 'AANBIEDERS_URL' ]) && is_null($crmBaseUrl) ) {
            $crmBaseUrl = $_SERVER[ 'AANBIEDERS_URL' ];
        }

        $this->crmBaseUrl = $crmBaseUrl;
    }


    protected function getCurlService()
    {
        if( is_null($this->curlService) ) {
            $this->curlService = new CurlService();
        }

        return $this->curlService;
    }

    protected function addCrmApiKey($attributes = array())
    {
        $attributes[ 'crm_api_id' ] = $_SERVER[ 'AB_CRM_ID' ];
        $attributes[ 'crm_api_key' ] = $_SERVER[ 'AB_CRM_KEY' ];

        return $attributes;
    }

    protected function addDefaultAttributes($attributes)
    {
        return array_merge( $this->defaults, $attributes );
    }

    protected function filterImmutableAttributes($attributes)
    {
        foreach( $this->guards as $guard ) {
            if( array_key_exists( $guard, $attributes ) ) {
                unset( $attributes[ $guard ] );
            }
        }

        return $attributes;
    }

}
