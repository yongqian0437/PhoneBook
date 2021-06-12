<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_emp_applicants extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model(['user_e_model', 'emp_applicants_model']);
        date_default_timezone_set('Asia/Kuala_Lumpur');
        
        // Checks if session is set and if user is signed in as Admin (authorised access). If not, deny his/her access.
        if (!$this->session->userdata('user_id') || $this->session->userdata('user_role') != "Admin"){  
            redirect('user/login/Auth/login');
        }
	}

    public function index()
    {   
        $data['title'] = 'iJEES | EP Applicants';
        $data['include_js'] = 'admin_emp_applicants_list';

        $this->load->view('internal/templates/header', $data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/admin_panel/applicants/admin_emp_app_list_view');
        $this->load->view('internal/templates/footer');
    }

    function all_emp_applicants_list()
    {
        // Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

        $emp_applicants = $this->emp_applicants_model->full_emp_apps_details();

        $counter = 1;

		$data = array();
		$base_url = base_url();

        foreach($emp_applicants as $emp_app) {
            
			$view = '<span><button type="button" onclick="view_emp_applicant('.$emp_app['emp_applicant_id'].')" class="btn icon-btn btn-xs btn-info waves-effect waves-light" data-toggle="modal" data-target="#view_emp_applicant"><span class="fas fa-eye"></span></button></span>';            

			$data [] = [ 
				$counter,
				$emp_app['user_fname']. ' ' .$emp_app['user_lname'], // from users table
				$emp_app['student_nationality'], // from students table
				$emp_app['emp_title'], // from employer_projects table
                $emp_app['emp_app_submitdate'], // from emp_applicants table
                $view,
            ];

            $counter++;
		}

        $output = array(
			"draw" => $draw,
			"recordsTotal" => count($emp_applicants),
			"recordsFiltered" =>count($emp_applicants),
			"data" => $data
		);

		echo json_encode($output);
		exit();
    }

    function view_emp_applicant()
    {
        $emp_applicant_details = $this->emp_applicants_model->emp_applicant_details($this->input->post('emp_applicant_id'));

        // var_dump($emp_applicant_details);
        // die;

        $output ='
        <table class="table table-striped" style = "border:0;">
            <tbody>
                <tr>
                    <th colspan="2" style = "background-color: #CCE3DE; font-weight: 900; text-align: center; font-size: 1.1em;">EMPLOYER PROJECT (EP) DETAILS</th>   
                </tr>
                <tr style="text-align: center">
                    <td colspan="2"><img src="'.base_url("assets/img/company_logos/").$emp_applicant_details['c_logo'].'" style="width: 250px; height: 100px; object-fit:contain;">
                    </td>  
                </tr>
                <tr>
                    <th scope="row">Company</th>
                    <td>'.$emp_applicant_details['c_name'].'</td>
                </tr>
                <tr>
                    <th scope="row">Country</th>
                    <td>'.$emp_applicant_details['c_country'].'</td>
                </tr>
                <tr>
                    <th scope="row">Employer Project Title</th>
                    <td>'.$emp_applicant_details['emp_title'].'</td>
                </tr>
                <tr>
                    <th colspan="2" style = "background-color: white"></th>   
                </tr>
                </tr>
                <tr>
                    <th colspan="2" style = "background-color: #CCE3DE; font-weight: 900; text-align: center; font-size: 1.1em;">APPLICANT DETAILS</th>   
                </tr>
                <tr>
                    <th scope="row">Date Applied</th>
                    <td>'.$emp_applicant_details['emp_app_submitdate'].'</td>
                </tr>
                <tr>
                    <th scope="row">Full Name</th>
                    <td>'.$emp_applicant_details['user_fname']. ' ' .$emp_applicant_details['user_lname'].'</td>
                </tr>
                <tr>
                    <th scope="row">Phone Number</th>
                    <td>'.$emp_applicant_details['student_phonenumber'].'</td>
                </tr>
                <tr>
                <th scope="row">Email</th>
                    <td>'.$emp_applicant_details['user_email'].'</td>
                </tr>
                <tr>
                    <th scope="row">Nationality</th>
                    <td>'.$emp_applicant_details['student_nationality'].'</td>
                </tr>
                <tr>
                    <th scope="row">Interest</th>
                    <td>'.$emp_applicant_details['student_interest'].'</td>
                </tr>
                <tr>
                    <th scope="row">Current Level</th>
                    <td>'.$emp_applicant_details['student_currentlevel'].'</td>
                </tr>
                <tr>
                    <th scope="row">Gender</th>
                    <td>'.$emp_applicant_details['student_gender'].'</td>
                </tr>
            </tbody>
        </table>
        
        ';

        echo $output;
    }

}

?>