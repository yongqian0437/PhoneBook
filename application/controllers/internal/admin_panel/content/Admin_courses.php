<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_courses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('universities_model');
		$this->load->model('courses_model');
		$this->load->model('course_applicants_model');		

	}

	public function index()
	{
		$data['include_js'] = 'admin_courses_list';
		$data['title'] = 'iJEES | Courses';
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/admin_panel/content/admin_courses_list_view');
        $this->load->view('internal/templates/footer'); 
    }

	public function admin_courses_list()
	{
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$courses = $this->courses_model->course_join_uni();
        
        $counter = 1;
		$data = array();

		foreach($courses as $r) {

            $view = '<span><button type="button" onclick="view_admin_course('.$r->course_id.')" class="btn icon-btn btn-xs btn-info waves-effect waves-light" data-toggle="modal" data-target="#view_my_rd_project"><span class="fas fa-eye"></span></button></span>';

			$data[] = array(
                $counter,
                $r->uni_name,
				$r->course_name,
				$r->course_area,
				$r->course_level,
				$view,
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

	function view_admin_course()
    {

        $course = $this->courses_model->one_course_join_uni($this->input->post('course_id'));

        $output ='
        <table class="table table-striped" style = "border:0;">
            <tbody>
                <tr>
                    <th colspan="2" style = "background-color: #CCE3DE; font-weight:900; font-size:1.1em;" scope="row">COURSE DETAILS</th>
                </tr>
                <tr>
                    <th scope="row">Course Name</th>
                    <td>'.$course->course_name.'</td>
                </tr>
                <tr>
                    <th scope="row">Course Area</th>
                    <td>'.$course->course_area.'</td>
                </tr>
                <tr>
                    <th scope="row">level</th>
                    <td>'.$course->course_level.'</td>
                </tr>
                <tr>
                    <th scope="row">Duration</th>
                    <td>'.$course->course_duration.'</td>
                </tr>
                <tr>
                    <th scope="row">Fee</th>
                    <td>RM '.number_format($course->course_fee).'</td>
                </tr>
                <tr>
                    <th scope="row">Intake</th>
                    <td>'.$course->course_intake.'</td>
                </tr>
                <tr>
                    <th scope="row">Career Opportunities</th>
                    <td>'.$course->course_careeropportunities	.'</td>
                </tr>
                <tr>
                    <th scope="row">Shortprofile</th>
                    <td style = "white-space: pre-wrap; word-break: break-word; text-align: justify;">'.$course->course_shortprofile.'</td>
                </tr>
                <tr>
                    <th scope="row">Requirements</th>
                    <td style = "white-space: pre-wrap; word-break: break-word; text-align: justify;">'.$course->course_requirements.'</td>
                </tr>
                <tr>
                    <th olspan="2" style = "background-color: white;" scope="row"></th>        
                <tr>
                <tr>
                    <th colspan="2" style = "background-color: #CCE3DE; font-weight:900; font-size:1.1em;" scope="row">UNIVERSITY DETAILS</th>
                </tr>
                <tr>
                    <th scope="row">University Name</th>
                    <td>'.$course->uni_name.'</td>
                </tr>
                <tr>
                <th scope="row">Country</th>
                    <td>'.$course->uni_country.'</td>
                </tr>
                <tr>
                    <th scope="row">Hotline</th>
                    <td>'.$course->uni_hotline.'</td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>'.$course->uni_email.'</td>
                </tr>
                <tr>
                <th scope="row">Address</th>
                    <td>'.$course->uni_address.'</td>
                </tr>
                <tr>
                    <th scope="row">QS Ranking</th>
                    <td>'.$course->uni_qsrank.'</td>
                </tr>
                <tr>
                    <th scope="row">Employability Ranking</th>
                    <td>'.$course->uni_employabilityrank.'</td>
                </tr>
                <tr>
                    <th scope="row">Total Students</th>
                    <td>'.$course->uni_totalstudents.'</td>
                </tr>
                <tr>
                    <th scope="row">Official Website</th>
                    <td><a href="'.$course->uni_website.'" target="_blank">'.$course->uni_website.'</a></td>
                </tr>
            </tbody>
        </table>
        
        ';

        echo $output;
    }

 
}