<?php

class IndexController extends BaseController {
	
	public function initialize() {

		if(!$this->session->get('auth')) return $this->response->redirect('auth/index');

		$this->tag->setTitle('Home');
		parent::initialize();
		
	}
	
	public function indexAction() {
			
	}
		
}