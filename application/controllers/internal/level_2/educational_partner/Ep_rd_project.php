<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ep_rd_project extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('user_ep_model');
		$this->load->model('courses_model');
		$this->load->model('universities_model');

        // Checks if session is set and if user signed in has a role. If not, deny his/her access.
        if (!$this->session->userdata('user_id') || !$this->session->userdata('user_role')){  
            redirect('user/login/Auth/login');
        }
	}

	public function index()
	{
		
		$data['title'] = 'iJEES | My R&D Project';
		$data['university_data'] = $this->user_ep_model->get_uni_from_ep($this->session->userdata('user_id')); 
        // $data['c'] = $this->user_ep_model->get_uni_from_ep($this->session->userdata('user_id')); 
        $data['include_js'] = 'ep_my_rd_list';

		$this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/level_2/educational_partner/ep_my_rd_list_view');
        $this->load->view('internal/templates/footer');  
	}

	public function course_list()
	{
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

        //get uni detail for one ep user with user_id
		$university_data = $this->user_ep_model->get_uni_from_ep($this->session->userdata('user_id')); 
        //get ep details with user id
        $ep_data = $this->user_ep_model->get_ep_detail_with_user_id($this->session->userdata('user_id'));
        //get rd project details with ep_id
		$rd_project_data = $this->user_ep_model->get_rd_for_ep($ep_data->ep_id);

        $counter = 1;

		$data = array();
		$base_url = base_url();

		foreach($courses as $r) {

            // $edit_link = $base_url."internal/level_2/educational_partner/ep_courses/edit_course/".$r->course_id;

            $delete = '<span><button type="button" onclick="delete_course('.$r->course_id.')" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" ><span class="fas fa-trash"></span></button></span>';
			$edit_opt = '<span class = "px-1"><a type="button" href = "'.$edit_link.'"class="btn icon-btn btn-xs btn-primary waves-effect waves-light"><span class="fas fa-pencil-alt"></span></a></span>';
			$view = '<span><button type="button" onclick="view_course('.$r->course_id.')" class="btn icon-btn btn-xs btn-info waves-effect waves-light" data-toggle="modal" data-target="#view_course"><span class="fas fa-eye"></span></button></span>';
			$function = $view.$edit_opt.$delete;

			$data[] = array(
				$counter,
				$r->course_name,
				$r->course_area,
				$r->course_level,
                $r->course_duration,
				"RM ".number_format($r->course_fee),
                $function,
			);

            $counter++;
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => count($courses),
			"recordsFiltered" =>count($courses),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

    

}