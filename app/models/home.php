<?php namespace Models;

/*
 * Home model
 *
 * Leon Rich
 */

class Home extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	
	// Get Observation Backgrounds information
	public function getObservationBackgrounds(){
		return $this->_db->select('SELECT ObservationID, ObservationDate, ClassName FROM '.PREFIX.'observationbackground order by ObservationDate desc');
    }
	
}