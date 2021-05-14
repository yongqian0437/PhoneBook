<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Compare extends CI_Controller {

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
		// $data['user_data'] = $this->session->userdata('user_id');
		$this->load->view('external/compare_view', $data);
        $this->load->view('external/templates/header');
        $this->load->view('external/templates/footer');
	}

	function fetch_courses()
	{
	  echo $this->courses_model->fetch_courses($this->input->post('uni_id'), $this->input->post('course_level'));
	  
	}

	function fetch_table()
	{
		$course_data1 = $this->courses_model->get_course_with_id($this->input->post('course_id1')); 
		$course_data2 = $this->courses_model->get_course_with_id($this->input->post('course_id2')); 
		$course_data3 = $this->courses_model->get_course_with_id($this->input->post('course_id3')); 
		$uni_data1 = $this->universities_model->get_uni_with_id($this->input->post('uni_id1')); 
		$uni_data2 = $this->universities_model->get_uni_with_id($this->input->post('uni_id2')); 
		$uni_data3 = $this->universities_model->get_uni_with_id($this->input->post('uni_id3')); 
		
		$base_url = base_url();
		$logo1 = $base_url.$uni_data1[0]->uni_logo;
		$logo2 = $base_url.$uni_data2[0]->uni_logo;
		$logo3 = $base_url.$uni_data3[0]->uni_logo;

		$output = 
		'<tbody>
			<tr>
				<td scope="col"></td>
				<td scope="col">
                    <center>
                        <img style=" height:85px; width: 250px; object-fit: contain;" src="'.$logo1.'" alt="logo1"><br><br>
                        <a style = "border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto; " href="" class = "btn btn-icon-split">
                            <span class = "icon text-white-600">
                                <i class = "fas fa-university p-1"></i>
                            </span>
                            <span style = "" class = "text">View University</span>
                        </a>
                    </center>  
                </td>
				<td scope="col">
                    <center>
                        <img style=" height:85px; width: 250px;  object-fit: contain;" src="'.$logo2.'" alt="logo2"><br><br>
                        <a style = "border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto;" href="" class = "btn btn-icon-split">
                            <span class = "icon text-white-600">
                                <i class = "fas fa-university p-1"></i>
                            </span>
                            <span style = "" class = "text">View University</span>
                        </a>                    
                    </center>   
                </td>
				<td scope="col">
                    <center>
                        <img style=" height:85px; width: 250px; object-fit: contain;" src="'.$logo3.'" alt="logo3"><br><br>
                        <a style = "border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto; " href="" class = "btn btn-icon-split">
                            <span class = "icon text-white-600">
                                <i class = "fas fa-university p-1"></i>
                            </span>
                            <span style = "" class = "text">View University</span>
                        </a>                    
                    </center>    
                </td>
			</tr>
			<tr>
				<th scope="row">Course Name</th>
				<td>'.$course_data1[0]->course_name.'</td>
				<td>'.$course_data2[0]->course_name.'</td>
				<td>'.$course_data3[0]->course_name.'</td>
			</tr>
			<tr>
				<th scope="row">Tuition Fee (RM)</th>
				<td>RM '.$course_data1[0]->course_fee.'</td>
				<td>RM '.$course_data2[0]->course_fee.'</td>
				<td>RM '.$course_data3[0]->course_fee.'</td>
			</tr>
			<tr>
				<th scope="row">Country</th>
				<td>'.$uni_data1[0]->uni_country.'</td>
				<td>'.$uni_data2[0]->uni_country.'</td>
				<td>'.$uni_data3[0]->uni_country.'</td>
			</tr>			
			<tr>
				<th scope="row">Area</th>
				<td>'.$course_data1[0]->course_area.'</td>
				<td>'.$course_data2[0]->course_area.'</td>
				<td>'.$course_data3[0]->course_area.'</td>
			</tr>
			<tr>
				<th scope="row">Level</th>
				<td>'.$course_data1[0]->course_level.'</td>
				<td>'.$course_data2[0]->course_level.'</td>
				<td>'.$course_data3[0]->course_level.'</td>
			</tr>
			<tr>
				<th scope="row">Duration (Year)</th>
				<td>'.$course_data1[0]->course_duration.' year</td>
				<td>'.$course_data2[0]->course_duration.' year</td>
				<td>'.$course_data3[0]->course_duration.' year</td>
			</tr>
			<tr>
				<th scope="row">Intake</th>
				<td>'.$course_data1[0]->course_intake.'</td>
				<td>'.$course_data2[0]->course_intake.'</td>
				<td>'.$course_data3[0]->course_intake.'</td>
			</tr>
			<tr>
				<th scope="row">World Ranking</th>
				<td>'.$uni_data1[0]->uni_qsrank.'</td>
				<td>'.$uni_data2[0]->uni_qsrank.'</td>
				<td>'.$uni_data3[0]->uni_qsrank.'</td>
			</tr>
			<tr>
				<th scope="row">Requirements</th>
				<td>'.$course_data1[0]->course_requirements.'</td>
				<td>'.$course_data2[0]->course_requirements.'</td>
				<td>'.$course_data3[0]->course_requirements.'</td>
			</tr>
            <tr>
				<th scope="row"></th>
                    <td>
                        <center>
                            <span>
                                <a style = "border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto;" href="" class = "btn btn-icon-split pr-1">
                                    <span class = "icon text-white-600">
                                        <i class = "fas fa-book p-1"></i>
                                    </span>
                                    <span style = "" class = "text">View Courses</span>
                                </a>
                                <a style = "border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto%;" href="" class = "btn btn-icon-split">
                                    <span class = "icon text-white-600">
                                        <i class = "fas fa-edit p-1"></i>
                                    </span>
                                    <span style = "" class = "text">Apply</span>
                                </a>
                            </span>
                        </center>
                    </td>
                    <td>  
                        <center>  
                            <span>
                                <a style = "border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto;" href="" class = "btn btn-icon-split pr-1">
                                    <span class = "icon text-white-600">
                                        <i class = "fas fa-book p-1"></i>
                                    </span>
                                    <span style = "" class = "text">View Courses</span>
                                </a>
                                <a style = "border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto%;" href="" class = "btn btn-icon-split">
                                    <span class = "icon text-white-600">
                                        <i class = "fas fa-edit p-1"></i>
                                    </span>
                                    <span style = "" class = "text">Apply</span>
                                </a>
                            </span>
                        </center>
                    </td>
                    <td>
                        <center>
                            <span>
                                <a style = "border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto;" href="" class = "btn btn-icon-split pr-1">
                                    <span class = "icon text-white-600">
                                        <i class = "fas fa-book p-1"></i>
                                    </span>
                                    <span style = "" class = "text">View Courses</span>
                                </a>
                                <a style = "border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto%;" href="" class = "btn btn-icon-split">
                                    <span class = "icon text-white-600">
                                        <i class = "fas fa-edit p-1"></i>
                                    </span>
                                    <span style = "" class = "text">Apply</span>
                                </a>
                            </span>
                        </center>
                    </td>
			</tr>

		</tbody>';

		echo $output;
	}
	
}