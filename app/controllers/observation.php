<?php namespace controllers;
use core\view,
    helpers\session as Session;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Observation extends \core\controller{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();

		$this->language->load('welcome');
	}

	/**
	 * define page title and load template files
	 */
	
	
	public function backgroundInformation($ObservationID) {
	
		$BInformation = new \models\backgroundInformation();
		if (!empty($_POST))
		{
			
			$dateFormated = split('-', $_POST['ObservationDate']);
			$date = $dateFormated[2].'-'.$dateFormated[0].'-'.$dateFormated[1];
			
			    $postdata = array(
					'StartingNumberOfFemales' => $_POST['StartingNumberOfFemales'],
					'EndingNumberOfFemales' => $_POST['EndingNumberOfFemales'],
					'StartingNumberOfMales' => $_POST['StartingNumberOfMales'],
					'EndingNumberOfMales' => $_POST['EndingNumberOfMales'],
					'ObtainedArtifactsCopy' => $_POST['ObtainedArtifactsCopy'] == 'on' ? 'true' : 'false',
					'UseInstructionalArtifacts' => $_POST['UseInstructionalArtifacts'] == 'on' ? 'true' : 'false',
					'ObservationDate' => $date,
					'ClassStartTime' => $_POST['ClassStartTime'],
					'ClassEndTime' => $_POST['ClassEndTime'],
					'Notes' => $_POST['Notes']
					
				);
     
	 /*
	 
	 */
	 
			$where = array('ObservationID' => Session::get('CurrentObservationID'));
			
			$BInformation->updateBackgroundInformation($postdata, $where); 
		}
		
		
		if (isset($ObservationID[0]))
		{
			$data['BackgroundInfo'] = $BInformation->getBackgroundInformation($ObservationID[0]);
			Session::set('CurrentObservationID',$ObservationID[0]);	
		}
		else
		{
			$data['BackgroundInfo'] = $BInformation->getBackgroundInformation(Session::get('CurrentObservationID'));
		}
		
		View::rendertemplate('header', $data);
		View::render('observation/backgroundInformation', $data);
		View::rendertemplate('footer', $data);
	}
	
	
	public function leadershipPractices() {
	
		$LPractices = new \models\leadershipPractices();
		
		if (!empty($_POST))
		{
			//var_dump($_POST);
			$where = array('ObservationID' => Session::get('CurrentObservationID'), 'POQType' => 'leadership');
			
			$LPractices->deleteLeadershipPractices($where);
			
			foreach ($_POST as $key => $value){
				if (substr($key, 0, 1) == "a") {
					$POQID = str_replace("a","",$key);
					
					$postdata = array(
					'POQID' => $POQID,
					'POQType' => 'Leadership',
					'Answer' => $value == 'on' ? 'true' : $value,
					'ObservationID' => Session::get('CurrentObservationID')
					);
					//echo 'qid'.$identifier.' - val'.$value.'<br />';
					$LPractices->insertLeadershipPractices($postdata, $where);
				}
			}
			
		}
		
		$data['LeadershipInfo'] = $LPractices->getLeadershipInfo(Session::get('CurrentObservationID'));	
		
		/*echo '<pre>';
	print_r($data['LeadershipInfo']);
	echo '</pre>'; */
	
		View::rendertemplate('header', $data);
		View::render('observation/leadershipPractices', $data);
		View::rendertemplate('footer', $data);
	}
	
	public function observationDetail() {
	
		$ODetail = new \models\observationDetail();
		
		if (!empty($_POST))
		{	
			    $postdata = array(
					'ClassActivityCode' => $_POST['ClassActivityCode'],
					'ClassOrganizationCode' => $_POST['ClassOrganizationCode'],
					'StudentDisengagementCode' => $_POST['StudentDisengagementCode'],
					'SolicitCount' => $_POST['SolicitCount'],
					'FactsCount' => $_POST['FactsCount'],
					'ProceduralCount' => $_POST['ProceduralCount'],
					'ExplainCount' => $_POST['ExplainCount'],
					'ApplyCount' => $_POST['ApplyCount'],
					'MetaCount' => $_POST['MetaCount'],
					'AcknowledgeCount' => $_POST['AcknowledgeCount'],
					'RephraseCount' => $_POST['RephraseCount'],
					'CorrectCount' => $_POST['CorrectCount'],
					'PraiseCount' => $_POST['PraiseCount'],
					'NewAndOldCount' => $_POST['NewAndOldCount'],
					'ItineraryCount' => $_POST['ItineraryCount'],
					'DirectionsCount' => $_POST['DirectionsCount'],
					'ForeshadowCount' => $_POST['ForeshadowCount'],
					'SituateCount' => $_POST['SituateCount'],
					'GiveInfoCount' => $_POST['GiveInfoCount'],
					'SuggestCount' => $_POST['SuggestCount'],
					'ThinkAloudCount' => $_POST['ThinkAloudCount'],
					'SummarizeCount' => $_POST['SummarizeCount'],
					'Notes' => $_POST['Notes']
				);
      
			$where = array('ObservationID' => Session::get('CurrentObservationID'));
			
			$ODetail ->updateObservationDetailInfo($postdata, $where); 
		}
		
		
		$data['ObservationDetail'] = $ODetail->getObservationDetailInfo(Session::get('CurrentObservationID'));

		$selectData1['id'] = 'ClassActivityCode';
		$selectData1['name'] = 'ClassActivityCode';
		$selectData1['value'] = 'DISC';
		$selectData1['data'] = $ODetail->getClassActivityCodes();
		$data['Select1'] = $selectData1;
		
		$selectData2['id'] = 'ClassOrganizationCode';
		$selectData2['name'] = 'ClassOrganizationCode';
		$selectData2['value'] = 'I';
		$selectData2['data'] = $ODetail->getClassOrganizationCodes();
		$data['Select2'] = $selectData2;
		
		$selectData3['id'] = 'StudentDisengagementCode';
		$selectData3['name'] = 'StudentDisengagementCode';
		$selectData3['value'] = 'FEW';
		$selectData3['data'] = $ODetail->getStudentDisengagementCodes();
		$data['Select3'] = $selectData3;
			
		View::rendertemplate('header', $data);
		View::render('observation/observationDetail', $data);
		View::rendertemplate('footer', $data);
	}
	
	public function scienceContent() {
	
		$SContent = new \models\scienceContent();
		
		if (!empty($_POST))
		{
			//var_dump($_POST);
			$where = array('ObservationID' => Session::get('CurrentObservationID'), 'POQType' => 'science');
			
			$SContent->deleteScienceContent($where);
			
			foreach ($_POST as $key => $value){
				if (substr($key, 0, 1) == "a") {
					$POQID = str_replace("a","",$key);
					
					$postdata = array(
					'POQID' => $POQID,
					'POQType' => 'Science',
					'Answer' => $value == 'on' ? 'true' : $value,
					'ObservationID' => Session::get('CurrentObservationID')
					);
					//echo 'qid'.$identifier.' - val'.$value.'<br />';
					$SContent->insertScienceContent($postdata, $where);
				}
			}
			
		}
		
		$data['ScienceInfo'] = $SContent->getScienceContentInfo(Session::get('CurrentObservationID'));	
		
		View::rendertemplate('header', $data);
		View::render('observation/scienceContent', $data);
		View::rendertemplate('footer', $data);
	
	}
	
	public function studentDirected() {
	
		$SDirected = new \models\studentDirected();
		
		if (!empty($_POST))
		{
			//var_dump($_POST);
			$where = array('ObservationID' => Session::get('CurrentObservationID'), 'POQType' => 'student');
			
			$SDirected->deleteStudentDirected($where);
			
			foreach ($_POST as $key => $value){
				if (substr($key, 0, 1) == "a") {
					$POQID = str_replace("a","",$key);
					
					$postdata = array(
					'POQID' => $POQID,
					'POQType' => 'Student',
					'Answer' => $value == 'on' ? 'true' : $value,
					'ObservationID' => Session::get('CurrentObservationID')
					);
					//echo 'qid'.$identifier.' - val'.$value.'<br />';
					$SDirected->insertStudentDirected($postdata, $where);
				}
			}
			
		}
	
		$data['StudentInfo'] = $SDirected->getStudentDirectedInfo(Session::get('CurrentObservationID'));	
		
		View::rendertemplate('header', $data);
		View::render('observation/studentDirected', $data);
		View::rendertemplate('footer', $data);
	}
	
	public function teacherDirected() {
	
		$TDirected = new \models\teacherDirected();
		
		if (!empty($_POST))
		{
			//var_dump($_POST);
			$where = array('ObservationID' => Session::get('CurrentObservationID'), 'POQType' => 'teacher');
			
			$TDirected->deleteTeacherDirected($where);
			
			foreach ($_POST as $key => $value){
				if (substr($key, 0, 1) == "a") {
					$POQID = str_replace("a","",$key);
					
					$postdata = array(
					'POQID' => $POQID,
					'POQType' => 'Teacher',
					'Answer' => $value == 'on' ? 'true' : $value,
					'ObservationID' => Session::get('CurrentObservationID')
					);
					//echo 'qid'.$identifier.' - val'.$value.'<br />';
					$TDirected->insertTeacherDirected($postdata, $where);
				}
			}
			
		}
		
		$data['TeacherInfo'] = $TDirected->getTeacherDirectedInfo(Session::get('CurrentObservationID'));	
		
		View::rendertemplate('header', $data);
		View::render('observation/teacherDirected', $data);
		View::rendertemplate('footer', $data);
	}

}