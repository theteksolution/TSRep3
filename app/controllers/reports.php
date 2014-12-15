<?php namespace controllers;
use core\view;


/*
 * Reports controller
 *
 * Leon Rich
 */

class Reports extends \core\controller{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();

		$this->language->load('welcome');
	}

	// index action
	public function index() {
		
		// Render the view
		View::rendertemplate('header', $data);
		View::render('reports/index', $data);
		View::rendertemplate('footer', $data);
	}
	
	
	// Action for Chart1 this is called via jQuery ajax
	public function chart1()
	{
	
		header("content-type:application/json");
		
		// Reference to the Reports controller
		$reps = new \models\reports();
		
		
		// Get the chart data
		$rslt = $reps->getChart1Data();
		
		
		// Create the x-axis labels
		$x['data'] = array('AcknowledgeCount','SolicitCount','ApplyCount','CorrectCount','DirectionsCount','ExplainCount','FactsCount','ForeshadowCount','GiveInfoCount','ItineraryCount','MetaCount','NewAndOldCount',
		'PraiseCount','ProceduralCount','ReflectCount','RephraseCount','SituateCount','SuggestCount','SummarizeCount','ThinkAloudCount');
		
		
		// y-axis data
		$y = array();
	
		foreach($rslt as $row)
		{
			$y['data'][] = $row;
		}
		
	
		// Create and encode the return array in json format
		$ret = array($x,$y);
		echo json_encode($ret, JSON_NUMERIC_CHECK);
	
	}
	

}