<?php namespace Models;

class StudentDirected extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	public function getStudentDirectedInfo($ID){
		return $this->_db->select("SELECT p.*, o.Answer FROM clob_postobservationquestions p 
										left join clob_observationsanswers o on p.poqid = o.poqid and o.ObservationID =:ID
										WHERE p.poqtype = 'student'  order by subsection,displayorder",array(':ID' => $ID));
    }
	
	
	public function deleteStudentDirected($where)
	{
		// First delete all records
		$this->_db->delete(PREFIX.'observationsanswers',$where);
		
	}
	
	
	public function insertStudentDirected($postdata, $where)
	{
		// then insert
		$this->_db->insert(PREFIX.'observationsanswers',$postdata);
	}
	
}