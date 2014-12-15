<?php namespace controllers;
use core\view;

/*
 
 */
class Admin extends \core\controller{

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
		
		
		View::rendertemplate('header', $data);
		View::render('admin/index', $data);
		View::rendertemplate('footer', $data);
	}

}