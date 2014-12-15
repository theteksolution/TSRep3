<?php namespace Models;

/*
 * Leadship Practices model
 *
 * Leon Rich
 */

class LeadershipPractices extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	// Get the leadershipPractices information
	public function getLeadershipInfo($ID){
		return $this->_db->select("SELECT p.*, o.Answer  FROM clob_postobservationquestions p 
										left join clob_observationsanswers o on p.poqid = o.poqid and o.ObservationID = :ID
										WHERE p.poqtype = 'leadership'  order by subsection,displayorder",array(':ID' => $ID));
    }
	
	
	// Delete leadershipPractices information
	public function deleteLeadershipPractices($where)
	{
		$this->_db->delete(PREFIX.'observationsanswers',$where);
	}
	
	// Insert leadershipPractices information
	public function insertLeadershipPractices($postdata, $where)
	{
		$this->_db->insert(PREFIX.'observationsanswers',$postdata);
	}
	
}