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
		
		$data['ObservationDetail'] = $ODetail->getObservationDetailInfo(Session::get('CurrentObservationID'));	
		$data['ClassActivityCodes'] = $ODetail->getClassActivityCodes();
		$data['ClassOrganizationCodes'] = $ODetail->getClassOrganizationCodes();
		$data['StudentDisengagementCodes'] = $ODetail->getStudentDisengagementCodes();
		
		View::rendertemplate('header', $data);
		View::render('observation/observationDetail', $data);
		View::rendertemplate('footer', $data);
	}
	
	public function scienceContent() {
	
		$SContent = new \models\scienceContent();
		
		$data['ScienceInfo'] = $SContent->getScienceContentInfo(Session::get('CurrentObservationID'));	
		
		View::rendertemplate('header', $data);
		View::render('observation/scienceContent', $data);
		View::rendertemplate('footer', $data);
	
	}
	
	public function studentDirected() {
	
		$SDirected = new \models\studentDirected();
		
		$data['StudentInfo'] = $SDirected->getStudentDirectedInfo(Session::get('CurrentObservationID'));	
		
		View::rendertemplate('header', $data);
		View::render('observation/studentDirected', $data);
		View::rendertemplate('footer', $data);
	}
	
	public function teacherDirected() {
	
		$TDirected = new \models\teacherDirected();
		
		$data['TeacherInfo'] = $TDirected->getTeacherDirectedInfo(Session::get('CurrentObservationID'));	
		
		
	
		View::rendertemplate('header', $data);
		View::render('observation/teacherDirected', $data);
		View::rendertemplate('footer', $data);
	}

}