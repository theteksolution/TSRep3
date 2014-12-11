<?php namespace Models;

class BackgroundInformation extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	public function getBackgroundInformation($ID){
		return $this->_db->selectOne('SELECT * FROM '.PREFIX.'observationbackground where ObservationId=:ID',array(':ID' => $ID));
    }
	
	public function updateBackgroundInformation($postdata, $where) { 
		$this->_db->update(PREFIX.'observationbackground',$postdata, $where);
	}
	
	
	public function insertBackgroundInformation($postdata) { 
		$this->_db->insert(PREFIX.'observationbackground',$postdata);
		return $this->_db->lastInsertId('observationID');
	}
}