<?php namespace Models;

/*
 * ScienceContent model
 *
 * Leon Rich
 */

class ScienceContent extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	
	// Get the Science Content information
	public function getScienceContentInfo($ID){
		return $this->_db->select("SELECT p.*, o.Answer  FROM clob_postobservationquestions as p 
										left join clob_observationsanswers as o on p.poqid = o.poqid and o.ObservationID = :ID
										WHERE p.poqtype = 'science'  order by subsection,displayorder",array(':ID' => $ID));
    }
	
	
	//Delete Science Content Information
	public function deleteScienceContent($where)
	{
		$this->_db->delete(PREFIX.'observationsanswers',$where);
	}
	
	// Insert Science Content information
	public function insertScienceContent($postdata, $where)
	{
		$this->_db->insert(PREFIX.'observationsanswers',$postdata);
	}
	
	
}