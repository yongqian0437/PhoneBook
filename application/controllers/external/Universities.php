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


		$universities = $this->universities_model->select_all();

		$data = array();
		$base_url = base_url();

		foreach($universities as $r) {

		$logo = $base_url.$r->uni_logo;

		$image = '<img style=" height:85px; width: 250px; object-fit: contain;" src="'.$logo.'" alt="logo"><br><br>'; 

		$action = '<a style = "border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto%;" href="" class = "btn btn-icon-split">
						<span class = "icon text-white-600">
							<i class = "fas fa-info-circle p-1"></i>
						</span>
						<span style = "" class = "text">University Info</span>
				   </a>';

			$data[] = array(
					$image,
					$r->uni_name,
					$r->uni_country,
					$r->uni_totalcourses,
					$r->uni_qsrank,
					$action,
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