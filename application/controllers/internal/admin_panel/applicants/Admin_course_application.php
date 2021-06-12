<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_course_application extends CI_Controller 
{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model(['course_applicants_model']);
        
        // Checks if session is set and if user is signed in as Admin (authorised access). If not, deny his/her access.
        if (!$this->session->userdata('user_id') || $this->session->userdata('user_role') != "Admin"){  
            redirect('user/login/Auth/login');
        }
    }

    public function index()
    {
        $data['title']= 'IJEES | Course Application';
        $data['include_js'] ='admin_course_application_list';
        $data['course_applicants']= $course_applicants=$this->course_applicants_model->full_course_app_details();
// var_dump( $data['course_applicants']);

// // var_dump(  $data['include_js']);
//  die;
        $this->load->view('internal/templates/header',$data);
        
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
       // $result=$this->course_applicants_model->index();
       // $data=array('calist'=>$result);
        $this->load->view('internal/admin_panel/applicants/admin_course_application_view');
        $this->load->view('internal/templates/footer');
    }

    public function admin_course_application_list()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
 
        //$course_applicants=$this->course_applicants_model->get_user_id($this->session->userdata('user_id'));
        $course_applicants=$this->course_applicants_model->full_course_app_details();
        $counter = 1;
 
        $data = array();
        $base_url = base_url();
 
        foreach($course_applicants as $ca) {
           $view = '<span><button type="button" onclick="view_admin_course_applicant('.$ca->c_applicant_id.')" class="btn icon-btn btn-xs btn-info waves-effect waves-light" data-toggle="modal" data-target="#view_admin_course_application"><span class="fas fa-eye"></span></button></span>';
          
           $data[] = array(
                $counter,
                $ca->c_applicant_fname ." " .$ca->c_applicant_lname,
                $ca->c_applicant_nationality,
                $ca->course_name,
                $ca->user_role,
                $ca->c_app_submitdate,
                $view,
            );
 
            $counter++;
        }
 
        $output = array(
            "draw" => $draw,
            "recordsTotal" => count($course_applicants),
            "recordsFiltered" =>count($course_applicants),
            "data" => $data
        );
 
        echo json_encode($output);
        exit();
    }

    function view_admin_course_applicant()
    {
       $ca_detail= $this->course_applicants_model->get_cas_id($this->input->post('c_applicant_id'));
       $course_applicants=$this->course_applicants_model->full_course_app_details();

       $output ='
        <table class="table table-striped" style = "border:0;">
            <tbody>
                <tr>
                    <th colspan="2" style = "background-color: #CCE3DE; font-weight: 900; text-align: center; font-size: 1.1em;">COURSE DETAILS</th>
                </tr>
                <tr>
                    <th scope="row">Logo</th>
                    <td colspan="2"><img src="'.base_url("assets/img/universities/").$course_applicants[0]->uni_logo.'" style="width: 250px; height: 100px; object-fit:contain;">
                    </td>  
                </tr>
                <tr>
                    <th scope="row">University</th>
                    <td>'.$course_applicants[0]->uni_name.'</td>
                </tr>
                <tr>
                    <th scope="row">Country</th>
                    <td>'.$course_applicants[0]->uni_country.'</td>
                </tr>
                <tr>
                    <th scope="row">Course</th>
                    <td>'.$course_applicants[0]->course_name.'</td>
                </tr>
                <tr>
                    <th colspan="2" style = "background-color: white"></th>   
                </tr>
                <tr>
                <th colspan="2" style = "background-color: #CCE3DE; font-weight: 900; text-align: center; font-size: 1.1em;">APPLICANT DETAILS</th>
                </tr>
                <tr>
                    <th scope="row">Applied Date</th>
                    <td>'.$ca_detail->c_app_submitdate.'</td>
                </tr>
                <tr>
                    <th scope="row">Full Name</th>
                    <td>'.$ca_detail->c_applicant_fname.' '.$ca_detail->c_applicant_lname.'</td>
                </tr>
                <tr>
                <th scope="row">Identification No.</th>
                    <td>'.$ca_detail->c_applicant_identification.'</td>
                </tr>
                <tr>
                    <th scope="row">Phone Number</th>
                    <td>'.$ca_detail->c_applicant_phonenumber.'</td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>'.$ca_detail->c_applicant_email.'</td>
               </tr>
                <tr>
                    <th scope="row">Nationality</th>
                    <td>'.$ca_detail->c_applicant_nationality.'</td>
                </tr>
                <tr>
                    <th scope="row">Gender</th>
                    <td>'.$ca_detail->c_applicant_gender.'</td>
                </tr>
                <tr>
                    <th scope="row">DOB</th>
                    <td>'.$ca_detail->c_applicant_dob.'</td>
                </tr>
                <tr>
                    <th scope="row">Current Level</th>
                    <td>'.$ca_detail->c_applicant_currentlevel.'</td>
                </tr>
                <tr>
                    <th scope="row">Address</th>
                    <td>'.$ca_detail->c_applicant_address.'</td>
                </tr>
                <tr>
                    <th scope="row">Document</th>
                    <td><a href="'.base_url("assets/uploads/course_applicant_form/").$ca_detail->c_applicant_document.'" target="_blank">'.$ca_detail->c_applicant_document.'</a></td>
            </tbody>
        </table>';

        echo $output;
    }
}

