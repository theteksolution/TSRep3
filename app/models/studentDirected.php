<?php namespace Models;

/*
 * StudentDirected model
 *
 * Leon Rich
 */

class StudentDirected extends \core\model {
    
	function __construct(){
		parent::__construct();
		}
    
	
	// Get the Student Directed information
	
	public function getStudentDirectedInfo($ID){
		return $this->_db->select("SELECT p.*, o.Answer FROM clob_postobservationquestions p 
										left join clob_observationsanswers o on p.poqid = o.poqid and o.ObservationID =:ID
										WHERE p.poqtype = 'student'  order by subsection,displayorder",array(':ID' => $ID));
    }
	
	// Delete Student Directed Information
	public function deleteStudentDirected($where)
	{
		$this->_db->delete(PREFIX.'observationsanswers',$where);	
	}
	
	
	// Insert Student Directed Information
	public function insertStudentDirected($postdata, $where)
	{
		$this->_db->insert(PREFIX.'observationsanswers',$postdata);
	}
	
}