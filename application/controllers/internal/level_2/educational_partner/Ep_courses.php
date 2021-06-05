<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ep_courses extends CI_Controller {

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
		
		$data['title'] = 'iJEES | Courses';
		$data['university_data'] = $this->user_ep_model->get_uni_from_ep($this->session->userdata('user_id')); 
        // $data['c'] = $this->user_ep_model->get_uni_from_ep($this->session->userdata('user_id')); 
        $data['include_js'] = 'ep_course_list';

		$this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/level_2/educational_partner/ep_course_list_view');
        $this->load->view('internal/templates/footer');  
	}

	public function course_list()
	{
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$university_data = $this->user_ep_model->get_uni_from_ep($this->session->userdata('user_id')); 

		$courses = $this->user_ep_model->get_course_for_uni($university_data->uni_id);

        $counter = 1;

		$data = array();
		$base_url = base_url();

		foreach($courses as $r) {

            $delete = '<span><button type="button" onclick="delete_course('.$r->course_id.')" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" ><span class="fas fa-trash"></span></button></span>';
			$edit_opt = '<span class = "px-1"><button type="button" class="btn icon-btn btn-xs btn-primary waves-effect waves-light"><span class="fas fa-pencil-alt"></span></button></span>';
			$view = '<span><button type="button" onclick="view_course('.$r->course_id.')" class="btn icon-btn btn-xs btn-info waves-effect waves-light" data-toggle="modal" data-target="#view_course"><span class="fas fa-eye"></span></button></span>';
			$function = $view.$edit_opt.$delete;

			$data[] = array(
				$counter,
				$r->course_name,
				$r->course_area,
				$r->course_level,
                $r->course_duration,
				"RM ".$r->course_fee,
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

    function add_course()
    {
        $data['title'] = 'iJEES | Add Courses';
        $data['university_data'] = $this->user_ep_model->get_uni_from_ep($this->session->userdata('user_id')); 

		$this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/level_2/educational_partner/ep_add_course_view');
        $this->load->view('internal/templates/footer');  
    }

    function submit_added_course($uni_id)
    {

    }

    function delete_course()
    {
        $this->courses_model->delete($this->input->post('course_id'));
    }

    function view_course()
    {
        $course_detail = $this->courses_model->get_course_with_id($this->input->post('course_id'));

        $output ='
        <table class="table table-striped" style = "border:0;">
            <tbody>
                <tr>
                    <th scope="row">Course Name</th>
                    <td>'.$course_detail[0]->course_name.'</td>
                </tr>
                <tr>
                    <th scope="row">Course Area</th>
                    <td>'.$course_detail[0]->course_area.'</td>
                </tr>
                <tr>
                    <th scope="row">level</th>
                    <td>'.$course_detail[0]->course_level.'</td>
                </tr>
                <tr>
                    <th scope="row">Duration</th>
                    <td>'.$course_detail[0]->course_duration.'</td>
                </tr>
                <tr>
                    <th scope="row">Fee</th>
                    <td>RM '.$course_detail[0]->course_fee.'</td>
                </tr>
                <tr>
                    <th scope="row">Intake</th>
                    <td>'.$course_detail[0]->course_intake.'</td>
                </tr>
                <tr>
                    <th scope="row">Career Opportunities</th>
                    <td>'.$course_detail[0]->course_careeropportunities	.'</td>
                </tr>
                <tr>
                    <th scope="row">Shortprofile</th>
                    <td style = "white-space: pre-wrap; word-break: break-word; text-align: justify;">'.$course_detail[0]->course_shortprofile.'</td>
                </tr>
                <tr>
                    <th scope="row">Requirements</th>
                    <td style = "white-space: pre-wrap; word-break: break-word; text-align: justify;">'.$course_detail[0]->course_requirements.'</td>
                </tr>
            </tbody>
        </table>
        
        ';

        echo $output;

    }

}