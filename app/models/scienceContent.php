<?php namespace Models;

class ScienceContent extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	public function getScienceContentInfo($ID){
		return $this->_db->select("SELECT * FROM clob_postobservationquestions as p 
										left join clob_observationsanswers as o on p.poqid = o.poqid and o.ObservationID = :ID
										WHERE p.poqtype = 'science'",array(':ID' => $ID));
    }
	
}