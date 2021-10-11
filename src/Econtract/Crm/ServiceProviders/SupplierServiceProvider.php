<?php namespace Econtract\Crm\ServiceProviders;


class SupplierServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);

        $this->guards = array(
            'status',
        );
    }


    /**
     * Submit a GET request to recover supplier ratings for a specific $id to the CRM API
     * @param       integer $id             ID of the supplier to be recovered
     * @return      mixed
     */
    public function getSupplierRating($id)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/suppliers/'. $id .'/rating' )
            ->withData( $this->addCrmApiKey() )
            ->get();
    }

}
