<?php namespace Models;

class Home extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	public function getObservationBackgrounds(){
		return $this->_db->select('SELECT ObservationID, ObservationDate FROM '.PREFIX.'observationbackground');
    }
	
}