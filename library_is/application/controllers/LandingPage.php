<?php

class LandingPage extends CI_Controller{

	public function index(){
		$data['title'] = 'Welcome';
		$this->load->view('templates/header', $data);
		$this->load->view('landingPage/index');
		$this->load->view('templates/footer');
	}

}