<?php namespace controllers;
use core\view,
    helpers\session as Session;

/*
 * Observation controller
 *
 * Leon Rich
 */
class Observation extends \core\controller{

	// Parent constructor
	public function __construct(){
		parent::__construct();

		$this->language->load('welcome');
	}

	
	// Action to handle backgroundInformation
	public function backgroundInformation($ObservationID) {
	
		// Add a reference to the backgroundInformation model
		$BInformation = new \models\backgroundInformation();
		
		// Check to see if this is a post
		if (!empty($_POST))
		{
		
			// Prep the data to be updated/inserted
			$dateFormated = split('-', $_POST['ObservationDate']);
			$date = $dateFormated[2].'-'.$dateFormated[0].'-'.$dateFormated[1];
			
			$postdata = array(
					'ClassName' => $_POST['ClassName'],
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
			//var_dump($_POST);
			
			
			// Insert or update the data
			if ($_POST['ObservationID'] != null)
			{
				$where = array('ObservationID' => Session::get('CurrentObservationID'));
				$BInformation->updateBackgroundInformation($postdata, $where); 
			}
			else
			{
				$newObservationID = $BInformation->insertBackgroundInformation($postdata);
				Session::set('CurrentObservationID',$newObservationID);	
				$data['ObservationID'] = $newObservationID;
			}
		
		}
		
		// Handle rendering based on ObservationID
		if (isset($ObservationID[0]))
		{
			$data['BackgroundInfo'] = $BInformation->getBackgroundInformation($ObservationID[0]);
			Session::set('CurrentObservationID',$ObservationID[0]);	
			$data['ObservationID'] = $ObservationID[0];
		}
		else
		{
			if (Session::get('CurrentObservationID') != null)
			{
				$data['BackgroundInfo'] = $BInformation->getBackgroundInformation(Session::get('CurrentObservationID'));
				$data['ObservationID'] = Session::get('CurrentObservationID');
			}
			else
			{
				Session::destroy('CurrentObservationID');
			}
		}
		
		
		// Render the view
		View::rendertemplate('header', $data);
		View::render('observation/backgroundInformation', $data);
		View::rendertemplate('footer', $data);
	}
	
	
	
	// Action to handle leadershipPractices
	public function leadershipPractices() {
	
	
		// Reference to the LeadershipPractices model
		$LPractices = new \models\leadershipPractices();
		
		
		// Check to see if this is a post
		if (!empty($_POST))
		{
			//var_dump($_POST);
			$where = array('ObservationID' => Session::get('CurrentObservationID'), 'POQType' => 'leadership');
			
			// Delete previous data
			$LPractices->deleteLeadershipPractices($where);
			
			
			// Insert the new data
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
		
		
		// Reload the leadership information
		$data['LeadershipInfo'] = $LPractices->getLeadershipInfo(Session::get('CurrentObservationID'));	
		
		/*echo '<pre>';
	print_r($data['LeadershipInfo']);
	echo '</pre>'; */
	
	
		// Render the view
		View::rendertemplate('header', $data);
		View::render('observation/leadershipPractices', $data);
		View::rendertemplate('footer', $data);
	}
	
	
	// Action for observationDetail
	public function observationDetail() {
	
	
		// Reference to the observationDetail model
		$ODetail = new \models\observationDetail();
		
		
		// Check to see if this is a post
		if (!empty($_POST))
		{	
		
		
			// Prepare data for table
			$postdata = array(
					'ObservationId' => Session::get('CurrentObservationID'),
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
		
		
			// Insert or Update the data
			if($ODetail->getObservationDetailInfo(Session::get('CurrentObservationID')) == null)
			{
				$ODetail ->insertObservationDetailInfo($postdata); 
			}
			else
			{
				$where = array('ObservationID' => Session::get('CurrentObservationID'));
				$ODetail ->updateObservationDetailInfo($postdata, $where); 
			}
			    
		}
		
		// Load data for rendering
		$data['ObservationDetail'] = $ODetail->getObservationDetailInfo(Session::get('CurrentObservationID'));

		// Load Dropdowns with data
		$selectData1['id'] = 'ClassActivityCode';
		$selectData1['name'] = 'ClassActivityCode';
		$selectData1['value'] = $data['ObservationDetail']->ClassActivityCode;
		$selectData1['data'] = $ODetail->getClassActivityCodes();
		$data['Select1'] = $selectData1;
		
		$selectData2['id'] = 'ClassOrganizationCode';
		$selectData2['name'] = 'ClassOrganizationCode';
		$selectData2['value'] = $data['ObservationDetail']->ClassOrganizationCode;
		$selectData2['data'] = $ODetail->getClassOrganizationCodes();
		$data['Select2'] = $selectData2;
		
		$selectData3['id'] = 'StudentDisengagementCode';
		$selectData3['name'] = 'StudentDisengagementCode';
		$selectData3['value'] = $data['ObservationDetail']->StudentDisengagementCode;
		$selectData3['data'] = $ODetail->getStudentDisengagementCodes();
		$data['Select3'] = $selectData3;
			
			
		// Render the view
		View::rendertemplate('header', $data);
		View::render('observation/observationDetail', $data);
		View::rendertemplate('footer', $data);
	}
	
	
	// Action for scienceContent
	public function scienceContent() {
	
	
		// Reference to the scienceContent model
		$SContent = new \models\scienceContent();
		
		
		// Check if this is a post
		if (!empty($_POST))
		{
			//var_dump($_POST);
			$where = array('ObservationID' => Session::get('CurrentObservationID'), 'POQType' => 'science');
			
			
			// Delete current information
			$SContent->deleteScienceContent($where);
			
			
			// Insert new data
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
		
		// Load data
		$data['ScienceInfo'] = $SContent->getScienceContentInfo(Session::get('CurrentObservationID'));	
		
		
		// Render view
		View::rendertemplate('header', $data);
		View::render('observation/scienceContent', $data);
		View::rendertemplate('footer', $data);
	
	}
	
	
	// Action for studentDirected
	public function studentDirected() {
	
		// Reference to the studentDirected model
		$SDirected = new \models\studentDirected();
		
		// Check to see if this is a post
		if (!empty($_POST))
		{
			//var_dump($_POST);
			$where = array('ObservationID' => Session::get('CurrentObservationID'), 'POQType' => 'student');
			
			
			// Delete current data
			$SDirected->deleteStudentDirected($where);
			
			
			// Insert new data
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
	
		// Load data
		$data['StudentInfo'] = $SDirected->getStudentDirectedInfo(Session::get('CurrentObservationID'));	
		
		
		// Render the view
		View::rendertemplate('header', $data);
		View::render('observation/studentDirected', $data);
		View::rendertemplate('footer', $data);
	}
	
	
	// Action for teacherDirected
	public function teacherDirected() {
	
	
		// Reference for the teacherDirected model
		$TDirected = new \models\teacherDirected();
		
		
		// Check is this is a post
		if (!empty($_POST))
		{
			//var_dump($_POST);
			$where = array('ObservationID' => Session::get('CurrentObservationID'), 'POQType' => 'teacher');
			
			
			// Delete current data
			$TDirected->deleteTeacherDirected($where);
			
			
			// Insert new data
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
		
		
		// Load data for view
		$data['TeacherInfo'] = $TDirected->getTeacherDirectedInfo(Session::get('CurrentObservationID'));	
		
		
		// Render view
		View::rendertemplate('header', $data);
		View::render('observation/teacherDirected', $data);
		View::rendertemplate('footer', $data);
	}

}