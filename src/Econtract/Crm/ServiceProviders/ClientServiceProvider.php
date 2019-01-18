<?php namespace Econtract\Crm\ServiceProviders;


class ClientServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);

        $this->guards = array(
            'user_id',
            'client_id',
        );
    }


    /**
     * Submit a GET request to recover client information for a specific $id to the CRM API
     * @param       integer $id             ID of the client to be recovered
     * @return      mixed
     */
    public function getClient($id)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/clients/'. $id )
            ->withData( $this->addCrmApiKey() )
            ->get();
    }

    /**
     * Submit a POST request to search the clients in the database to the CRM API
     * @param       string $query           Query string that will be used to search the database
     * @return      mixed
     */
    public function searchClient($query)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/clients/search' )
            ->returnResponseObject()
            ->withData( $this->addCrmApiKey( array( 'query' => $query ) ) )
            ->post();
    }

    /**
     * Submit a POST request to create a new client to the CRM API
     * @param       array $attributes       Data array containing all the client attributes
     * @return      mixed
     */
    public function createClient($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/clients' )
            ->returnResponseObject()
            ->withData( $this->addCrmApiKey( $attributes ) )
            ->post();
    }

    /**
     * Submit a POST request to update the client information for client with $id to the CRM API
     * @param       integer $id             ID of the client to be recovered
     * @param       array $attributes       Data array containing all the client attributes
     * @return      mixed
     */
    public function updateClient($id, $attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/clients/'. $id )
            ->returnResponseObject()
            ->withData( $this->addCrmApiKey( $this->filterImmutableAttributes( $attributes ) ) )
            ->post();
    }

}