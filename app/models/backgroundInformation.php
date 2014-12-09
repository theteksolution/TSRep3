<?php namespace Models;

class BackgroundInformation extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	public function getBackgroundInformation($ID){
		return $this->_db->selectOne('SELECT * FROM '.PREFIX.'observationbackground where ObservationId=:ID',array(':ID' => $ID));
    }
	
}