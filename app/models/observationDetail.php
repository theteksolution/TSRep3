<?php namespace Models;

class ObservationDetail extends \core\model {
    
	function __construct(){
		parent::__construct();
    }
	
	public function getObservationDetailInfo($ID){
		return $this->_db->selectOne("SELECT * FROM clob_observationinformation WHERE observationID = :ID",array(':ID' => $ID));
    }
	
	public function updateObservationDetailInfo($postdata, $where) { 
		$this->_db->update(PREFIX.'observationinformation',$postdata, $where);
	}
	
	public function insertObservationDetailInfo($postdata) { 
		$this->_db->insert(PREFIX.'observationinformation',$postdata);
	}
	
	public function getClassActivityCodes()
	{
		return array("INST"=>"INST", "MODL"=>"MODL", "DISC"=>"DISC", "DEMO"=>"DEMO", "READ"=>"READ", "SIM"=>"SIM","PRES"=>"PRES","WRIT"=>"WRIT", 
		"HANDS"=>"HANDS", "LIT"=>"LIT", "FIELD"=>"FIELD","ASMT"=>"ASMT", "SEC"=>"SEC", "STN"=>"STN");
	}
	
	public function getClassOrganizationCodes()
	{
		return array("I"=>"I", "P"=>"P", "G"=>"G", "W"=>"W");
	}
	
	public function getStudentDisengagementCodes()
	{	
		return array("NONE"=>"NONE", "FEW"=>"FEW", "HALF"=>"HALF", "MOST"=>"MOST", "ALL"=>"ALL", "NA"=>"NA");
	}
	
}