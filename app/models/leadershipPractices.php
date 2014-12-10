<?php namespace Models;

class LeadershipPractices extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	public function getLeadershipInfo($ID){
		return $this->_db->select("SELECT p.*, o.Answer  FROM clob_postobservationquestions p 
										left join clob_observationsanswers o on p.poqid = o.poqid and o.ObservationID = :ID
										WHERE p.poqtype = 'leadership'  order by subsection,displayorder",array(':ID' => $ID));
    }
	
	
	public function deleteLeadershipPractices($where)
	{
		// First delete all records
		$this->_db->delete(PREFIX.'observationsanswers',$where);
		
	}
	
	public function insertLeadershipPractices($postdata, $where)
	{
		// then insert
		$this->_db->insert(PREFIX.'observationsanswers',$postdata);
	}
	
}