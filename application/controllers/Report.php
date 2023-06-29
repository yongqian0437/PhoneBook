<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');

		// If user is not login bring them back to login page
		if (!$this->session->has_userdata('has_login')) {
			redirect('user/auth/login');
		}
	}

	public function index()
	{
		$data['title'] = 'Dementia App | Report';

		$this->load->view('templates/header', $data);
		$this->load->view('report_view.php');
		$this->load->view('templates/footer');
	}
	//
	public function generate_report()
	{
		// Load any necessary data from your database or other sources
		$data = array(
			array('Year', 'Sales'),
			array('2018', 100),
			array('2019', 250),
			array('2020', 400),
			array('2021', 600)
		);

		// Convert the data into JSON format
		$json_data = json_encode($data);

		// Pass the data to the view
		$this->load->view('graph', array('data' => $json_data));
	}
}
