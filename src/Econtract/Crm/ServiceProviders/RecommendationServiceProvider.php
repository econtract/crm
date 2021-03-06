<?php namespace Econtract\Crm\ServiceProviders;


class RecommendationServiceProvider extends BaseServiceProvider {

    /**
     * Submit a GET request to recover recommendation information for a specific $id to the CRM API
     * @param       integer $id             ID of the recommendation to be recovered
     * @return      mixed
     */
    public function getRecommendation($id, $comparisonId = 0)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/recommendations/'. $id )
            ->withData( $this->addCrmApiKey( array( 'comparison_id' => $comparisonId ) ) )
            ->get();
    }

    /**
     * Submit a GET request to recover renewal information for a recommendation
     * @param       integer $id             ID of the renewal for which the information is to be recovered
     * @return      mixed
     */
    public function getRenewal($id, $comparisonId = 0)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/api/recommendations/'. $id .'/renewal' )
            ->withData( $this->addCrmApiKey( array( 'comparison_id' => $comparisonId ) ) )
            ->get();
    }

}