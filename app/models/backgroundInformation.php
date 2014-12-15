<?php namespace Models;


/*
 * BackgroundINformation model
 *
 * Leon Rich
 */

class BackgroundInformation extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	// Get the backgroundInformation
	public function getBackgroundInformation($ID){
		return $this->_db->selectOne('SELECT * FROM '.PREFIX.'observationbackground where ObservationId=:ID',array(':ID' => $ID));
    }
	
	
	// Update the backgroundInformation
	public function updateBackgroundInformation($postdata, $where) { 
		$this->_db->update(PREFIX.'observationbackground',$postdata, $where);
	}
	
	// Insert the backgroundInformation
	public function insertBackgroundInformation($postdata) { 
		$this->_db->insert(PREFIX.'observationbackground',$postdata);
		return $this->_db->lastInsertId('observationID');
	}
}