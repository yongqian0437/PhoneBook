<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Universities extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('universities_model');
		$this->load->model('courses_model');

	}

	public function index()
	{
		$data['university_data'] = $this->universities_model->select_all_approved_only(); 
		

		$this->load->view('external/universities_view', $data);
        $this->load->view('external/templates/header');
        $this->load->view('external/templates/footer');
	}

	public function universities_list()
     {

		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$universities = $this->universities_model->select_all_approved_only();

		$data = array();

		foreach($universities as $r) {

			$data[] = array(
					$r->uni_country,
					$r->uni_name,
					$r->uni_totalcourses,
					$r->uni_qsrank,
					$r->uni_totalstudents
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => count($universities),
			"recordsFiltered" =>count($universities),
			"data" => $data
		);

		echo json_encode($output);
		exit();
     }

	
}