<?php namespace Models;

class TeacherDirected extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	public function getTeacherDirectedInfo($ID){
		return $this->_db->select("SELECT p.*, o.Answer  FROM clob_postobservationquestions as p 
										left join clob_observationsanswers as o on p.poqid = o.poqid and o.ObservationID = :ID
										WHERE p.poqtype = 'teacher'  order by subsection,displayorder",array(':ID' => $ID));
    }
	
	public function deleteTeacherDirected($where)
	{
		// First delete all records
		$this->_db->delete(PREFIX.'observationsanswers',$where);
		
	}
	
	public function insertTeacherDirected($postdata, $where)
	{
		// then insert
		$this->_db->insert(PREFIX.'observationsanswers',$postdata);
	}
	
}