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
		$data['include_js'] = 'universities_list';
		$data['include_js2'] = '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.24/datatables.min.css"/>';
		$data['include_js3'] = '<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.24/datatables.min.js"></script>';
		$data['title'] = 'iJEES | Universities';
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

		$uni_link = $base_url."external/Universities/university_detail/".$r->uni_id;

		$action = '<a style = "border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto%;" href="'.$uni_link.'" class = "btn btn-icon-split">
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

	public function university_detail($uni_id)
	{
		
		$data['title'] = 'iJEES | University';
		$data['uni_detail'] = $this->universities_model->get_uni_detail($uni_id);
		$data['course_field'] = $this->courses_model->course_field_dropdown($uni_id);
		$data['include_js'] = 'university_detail';

		$this->load->view('external/universitiy_detail_view', $data);
		$this->load->view('external/templates/header');
		$this->load->view('external/templates/footer');
	}

	public function fetch_course_list()
	{
		$course_data = $this->courses_model->get_course_with_course_area($this->input->post('course_area'), $this->input->post('uni_id')); 

		$output = "";

		foreach($course_data as $row)
		{
			$output .= 
			'
			<div class = "row pt-2  pb-2" style = "border-top:1px solid rgba(169, 169, 169, .5);">
				<div class="col-md-7 pt-2 pl-2" >
					<div style = "font-size:1.0em; color:black; font-weight:700;">'.$row->course_name.'</div>
					<div style = "font-size:0.8em; color:grey;">'.$row->course_level.'</div>
				</div>
				<div class="col-md-1 pt-2" >
					<center>
						<div style = "font-size:1.0em; color:black; font-weight:600;">'.$row->course_duration.'</div>
						<div style = "font-size:0.8em; color:grey;">years</div>
					</center>
				</div>
				<div class="col-md-1 pt-2" >
					<center>
						<div style = "font-size:1.0em; color:black; font-weight:600;">RM '.$row->course_fee.'</div>
						<div style = "font-size:0.8em; color:grey;">per year</div>
					</center>
				</div>
				<div class="col-md-3 pt-2 pl-5">
					<button type="button" href = "" class="btn btn-sm " style = "background-color:#A4C3B2; color:white; font-size:0.9em;">View</button>
					<button type="button" href = "" class="btn btn-sm" style = "background-color:#A4C3B2; color:white; font-size:0.9em;">Apply</button>
				</div>
			</div>
			';
		}

		echo $output;
	}
 
}