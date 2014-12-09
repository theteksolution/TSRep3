<?php namespace Models;

class LeadershipPractices extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	public function getLeadershipInfo($ID){
		return $this->_db->select("SELECT * FROM clob_postobservationquestions p 
										left join clob_observationsanswers o on p.poqid = o.poqid and o.ObservationID = :ID
										WHERE p.poqtype = 'leadership'",array(':ID' => $ID));
    }
	
}