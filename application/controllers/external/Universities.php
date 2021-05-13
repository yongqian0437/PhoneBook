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

		foreach($universities as $r) {

		if($r->uni_approval == true){
			$approval = '<button type="button" class="btn btn-success" onclick="changeApproval('.$r->uni_id.')">Approved</button>' ;
		}
		else{
			$approval = '<button type="button" class="btn btn-danger" onclick="changeApproval('.$r->uni_id.')">Pending</button>' ;
		}
		$action = '<a style = "border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto%;" href="" class = "btn btn-icon-split">
						<span class = "icon text-white-600">
							<i class = "fas fa-info-circle p-1"></i>
						</span>
						<span style = "" class = "text">University Info</span>
				   </a>';

			$data[] = array(
					$approval,
					$r->uni_name,
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


	 function switch_approval(){

		$uni_id = $this->input->post('uni_id'); 
		$uni_data = $this->universities_model->get_uni_with_id($uni_id);

		if($uni_data[0]->uni_approval == 1){
			$data['uni_approval'] = 0;
		}

		else{
			$data['uni_approval'] = 1;
		}
		$this->universities_model->update($data, $uni_id);

	 }

	
}