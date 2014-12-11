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
		
		$homeModel = new \models\home();
		
		
		if (!empty($_POST))
		{
			//var_dump($_POST);
			if ($_POST['username'] == 'test' && $_POST['password'] == 'test')
			{
				Session::set('CurrentUserID','test');
			}
		}
		
		if (Session::get('CurrentUserID') != null)
		{
		
			$data['ObsBackgrounds'] = $homeModel->getObservationBackgrounds();
		}
		
		
		Session::destroy('CurrentObservationID');
		
		View::rendertemplate('header', $data);
		View::render('home/index', $data);
		View::rendertemplate('footer', $data);
	}

}