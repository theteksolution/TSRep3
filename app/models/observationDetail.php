<?php namespace Models;

class ObservationDetail extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	public function getObservationDetailInfo($ID){
		return $this->_db->selectOne("SELECT * FROM clob_observationinformation WHERE observationID = :ID",array(':ID' => $ID));
    }
	
	public function getClassActivityCodes()
	{
		return array("INST", "MODL", "DISC", "DEMO", "READ", "SIM", "PRES", "WRIT", "HANDS", "LIT", "FIELD","ASMT", "SEC", "STN");
	}
	
	public function getClassOrganizationCodes()
	{
		return array("I", "P", "G", "W");
	}
	
	public function getStudentDisengagementCodes()
	{	
		return array("NONE", "FEW", "HALF", "MOST", "ALL", "NA");
	}
	
}