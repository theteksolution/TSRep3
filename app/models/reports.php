<?php namespace Models;

/*
 * Reports model
 *
 * Leon Rich
 */


class Reports extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	
	// Get the summary data for the chart
	public function getChart1Data(){
		return $this->_db->selectOne("select sum(AcknowledgeCount) as 'AcknowledgeCount', 
sum(SolicitCount) as 'SolicitCount', 
sum(ApplyCount) as 'ApplyCount', 
sum(CorrectCount) as 'CorrectCount', 
sum(DirectionsCount) as 'DirectionsCount', 
sum(ExplainCount) as 'ExplainCount', 
sum(FactsCount) as 'FactsCount', 
sum(ForeshadowCount) as 'ForeshadowCount', 
sum(GiveInfoCount) as 'GiveInfoCount', 
sum(ItineraryCount) as 'ItineraryCount', 
sum(MetaCount) as 'MetaCount', 
sum(NewAndOldCount) as 'NewAndOldCount', 
sum(PraiseCount) as 'PraiseCount', 
sum(ProceduralCount) as 'ProceduralCount', 
sum(ReflectCount) as 'ReflectCount', 
sum(RephraseCount) as 'RephraseCount', 
sum(SituateCount) as 'SituateCount',
sum(SuggestCount) as 'SuggestCount',
sum(SummarizeCount) as 'SummarizeCount',
sum(ThinkAloudCount) as 'ThinkAloudCount'
from clob_observationinformation");
		
		//return $this->_db->callStoredProcedure("GetObservationInfoCounts");
    }
	
	
}