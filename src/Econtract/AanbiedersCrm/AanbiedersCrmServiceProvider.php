<?php namespace Econtract\AanbiedersCrm;


use Illuminate\Support\ServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\AddressServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\ClientServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\ContractServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\OrderServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\RecommendationServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\CallMeBackLeadServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\ClickOutLeadServiceProvider;
use Econtract\AanbiedersCrm\ServiceProviders\ReferralLeadServiceProvider;

class AanbiedersCrmServiceProvider extends ServiceProvider {

    protected $defer = false;


    /**
     * @return void
     */
    public function register()
    {
        $baseUrl = null;
        if( isset($_SERVER[ 'AB_CRM_URL' ]) ) {
            $baseUrl = $_SERVER[ 'AB_CRM_URL' ];
        }

        if( isset($_SERVER[ 'AANBIEDERS_URL' ]) ) {
            $baseUrl = $_SERVER[ 'AANBIEDERS_URL' ];
        }

        $this->registerAddressServiceProvider( $baseUrl );
        $this->registerClientServiceProvider( $baseUrl );
        $this->registerContractServiceProvider( $baseUrl );
        $this->registerOrderServiceProvider( $baseUrl );
        $this->registerRecommendationServiceProvider( $baseUrl );

        $this->registerCallMeBackLeadServiceProvider( $baseUrl );
        $this->registerClickOutLeadServiceProvider( $baseUrl );
        $this->registerReferralLeadServiceProvider( $baseUrl );

        $this->registerCrmService();
    }

    protected function registerAddressServiceProvider($baseUrl)
    {
        $this->app['Crm.address'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new AddressServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerClientServiceProvider($baseUrl)
    {
        $this->app['Crm.client'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new ClientServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerContractServiceProvider($baseUrl)
    {
        $this->app['Crm.contract'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new ContractServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerOrderServiceProvider($baseUrl)
    {
        $this->app['Crm.order'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new OrderServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerRecommendationServiceProvider($baseUrl)
    {
        $this->app['Crm.recommendation'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new RecommendationServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerCallMeBackLeadServiceProvider($baseUrl)
    {
        $this->app['Crm.callMeBackLead'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new CallMeBackLeadServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerClickOutLeadServiceProvider($baseUrl)
    {
        $this->app['Crm.clickOutLead'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new ClickOutLeadServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerReferralLeadServiceProvider($baseUrl)
    {
        $this->app['Crm.referralLead'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new ReferralLeadServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerCrmService()
    {
        $this->app['AanbiedersCrm'] = $this->app->share(
            function($app)
            {
                return new CrmService(
                    $app['Crm.address'],
                    $app['Crm.client'],
                    $app['Crm.contract'],
                    $app['Crm.order'],
                    $app['Crm.recommendation'],
                    $app['Crm.callMeBackLead'],
                    $app['Crm.clickOutLead'],
                    $app['Crm.referralLead']
                );
            }
        );
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('AanbiedersCrm');
    }

    public function boot()
    {
        // ...
    }

}
