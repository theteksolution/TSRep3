<?php namespace Controllers;
use core\view,
    helpers\session as Session;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
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
		//$data['welcome_message'] = $this->language->get('welcome_message');
		
		$data['welcome_message'] = 'Howdy!!';
		$homeModel = new \models\home();
		Session::destroy('CurrentObservationID');
		
		
		$data['ObsBackgrounds'] = $homeModel->getObservationBackgrounds();
		
		
		View::rendertemplate('header', $data);
		View::render('home/index', $data);
		View::rendertemplate('footer', $data);
	}

}