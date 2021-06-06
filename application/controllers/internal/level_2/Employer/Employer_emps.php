<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer_emps extends CI_Controller 
{

    public function __construct()
	{
		parent::__construct();
		$this->load->model(['user_model', 'user_e_model', 'company_model', 'employer_projects_model']);
        
        // Checks if session is set and if user is signed in as Employer (authorised access). If not, deny his/her access.
        // if (!$this->session->userdata('user_id') || $this->session->userdata('user_role') != "Employer"){  
        //     redirect('user/login/Auth/login');
        // }

        if ($this->session->userdata('has_login') != 0 && $this->session->userdata('user_role') != "Employer"){
            redirect('user/login/Auth/login');
        }
	}

    public function index()
    {   
        $data['title'] = 'iJEES | Employer Projects (EPs)';
        $data['include_js'] = 'employer_emp_list';
        // var_dump($this->session->userdata());
        // die;
        $e_details = $this->user_e_model->e_details($this->session->userdata('user_id'));
        $data['company_details'] = $this->company_model->c_details($e_details['c_id']);
        $data['employer_projects'] = $this->employer_projects_model->get_emps_from_employer($e_details['e_id']);

        $this->load->view('internal/templates/header', $data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/level_2/employer/employer_emp_list_view');
        $this->load->view('internal/templates/footer');
    }

    public function emp_list()
	{
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

        $e_details = $this->user_e_model->e_details($this->session->userdata('user_id'));
        $employer_projects = $this->employer_projects_model->get_emps_from_employer($e_details['e_id']);

        $counter = 1;

		$data = array();
		$base_url = base_url();

		foreach($employer_projects as $r) {
            $edit_link = $base_url."internal/level_2/Employer/Employer_emps/edit_emp/".$r->emp_id;

            $delete = '<span><button type="button" onclick="delete_emp('.$r->emp_id.')" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" ><span class="fas fa-trash"></span></button></span>';
			$edit_opt = '<span class = "px-1"><a type="button" href = "'.$edit_link.'"class="btn icon-btn btn-xs btn-primary waves-effect waves-light"><span class="fas fa-pencil-alt"></span></a></span>';
			$view = '<span><button type="button" onclick="view_emp('.$r->emp_id.')" class="btn icon-btn btn-xs btn-info waves-effect waves-light" data-toggle="modal" data-target="#view_emp"><span class="fas fa-eye"></span></button></span>';
			$function = $view.$edit_opt.$delete;

			$data[] = array(
				$counter,
				$r->emp_title,
				$r->emp_area,
				$r->emp_level,
                $r->emp_date,
                $function,
			);

            $counter++;
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => count($employer_projects),
			"recordsFiltered" =>count($employer_projects),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

    // function add_emp()
    // {
    //     $data['title'] = 'iJEES | Add Employer Project';
    //     $e_details = $this->user_e_model->e_details($this->session->userdata('user_id'));
    //     $data['company_details'] = $this->company_model->c_details($e_details['c_id']); 

	// 	$this->load->view('internal/templates/header',$data);
    //     $this->load->view('internal/templates/sidenav');
    //     $this->load->view('internal/templates/topbar');
    //     $this->load->view('internal/level_2/employer/employer_add_emp_view');
    //     $this->load->view('internal/templates/footer');  
    // }

    function view_emp()
    {
        $emp_detail = $this->employer_projects_model->get_emp_with_id($this->input->post('emp_id'));

        $output ='
        <table class="table table-striped" style = "border:0;">
            <tbody>
                <tr>
                    <th scope="row">Date Submitted</th>
                    <td>'.$emp_detail[0]->emp_date.'</td>
                </tr>
                <tr>
                    <th scope="row">Project Title</th>
                    <td>'.$emp_detail[0]->emp_title.'</td>
                </tr>
                <tr>
                    <th scope="row">Field</th>
                    <td>'.$emp_detail[0]->emp_area.'</td>
                </tr>
                <tr>
                    <th scope="row">Level</th>
                    <td>'.$emp_detail[0]->emp_level.'</td>
                </tr>
                <tr>
                    <th scope="row">Description</th>
                    <td>RM '.$emp_detail[0]->emp_description.'</td>
                </tr>
            </tbody>
        </table>
        
        ';

        echo $output;
    }

}
?>