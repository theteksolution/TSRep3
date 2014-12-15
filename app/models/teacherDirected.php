<?php namespace Models;

/*
 * TeacherDirected model
 *
 * Leon Rich
 */

class TeacherDirected extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	// Get Teacher Directed Information
	public function getTeacherDirectedInfo($ID){
		return $this->_db->select("SELECT p.*, o.Answer  FROM clob_postobservationquestions as p 
										left join clob_observationsanswers as o on p.poqid = o.poqid and o.ObservationID = :ID
										WHERE p.poqtype = 'teacher'  order by subsection,displayorder",array(':ID' => $ID));
    }
	
	
	// Delete Teacher Directed Information
	public function deleteTeacherDirected($where)
	{
		$this->_db->delete(PREFIX.'observationsanswers',$where);
	}
	
	// Insert Teacher Directed Information
	public function insertTeacherDirected($postdata, $where)
	{
		$this->_db->insert(PREFIX.'observationsanswers',$postdata);
	}
	
}