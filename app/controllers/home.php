<?php namespace Controllers;
use core\view,
    helpers\session as Session;

/*
 * Home controller
 *
 * Leon Rich
 */
class Home extends \core\controller {

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
	public function index() {
		$data['title'] = 'Home';
		
		// Add a reference to the Home model
		$homeModel = new \models\home();
		
		
		// Check to see if this is a post
		if (!empty($_POST))
		{
			//var_dump($_POST);
			
			// Set UserID in a session
			if ($_POST['username'] == 'test' && $_POST['password'] == 'test')
			{
				Session::set('CurrentUserID','test');
			}
		}
		
		// Get the Observations list if we have a user
		if (Session::get('CurrentUserID') != null)
		{
		
			$data['ObsBackgrounds'] = $homeModel->getObservationBackgrounds();
		}
		
		
		Session::destroy('CurrentObservationID');
		
		
		// Render the view
		View::rendertemplate('header', $data);
		View::render('home/index', $data);
		View::rendertemplate('footer', $data);
	}

}