<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	
	public function index()
	{
		$data['title'] = 'iJEES | Homepage';
		$data['include_css'] = 'homepage';
		$this->load->view('external/templates/header', $data);
		$this->load->view('external/homepage_view');
		$this->load->view('external/templates/footer');
	}
}
