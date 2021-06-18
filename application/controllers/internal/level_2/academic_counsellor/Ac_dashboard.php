<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ac_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_ac_model', 'course_applicants_model', 'universities_model', 'user_student_model', 'user_ea_model']);
        date_default_timezone_set('Asia/Kuala_Lumpur');

        // Checks if session is set and if user is signed in as Academic Counsellor (authorised access). If not, deny his/her access.
        // if (!$this->session->userdata('user_id') || $this->session->userdata('user_role') != "Academic Counsellor"){  
        //     redirect('user/login/Auth/login');
        // }

        if ($this->session->userdata('has_login') != 0 && $this->session->userdata('user_role') != "Academic Counsellor") {
            redirect('user/login/Auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'iJEES | Dashboard';
        $data['include_js'] = 'ac_dashboard';

        $ac_details = $this->user_ac_model->ac_details($this->session->userdata('user_id'));
        $data['total_course_applicants'] = count($this->course_applicants_model->get_applicants_from_course($ac_details['uni_id']));       
        $data['total_by_students'] = count($this->course_applicants_model->get_applicants_from_method($ac_details['uni_id'], 'Student'));      
        $data['total_by_ea'] = count($this->course_applicants_model->get_applicants_from_method($ac_details['uni_id'], 'Education Agent'));


        // $ac_details = $this->user_ac_model->ac_details($this->session->userdata('user_id'));
        // $course_applicants = $this->course_applicants_model->get_applicants_from_course($ac_details['ac_id'], $ac_details['uni_id']);
        // var_dump($course_applicants); die;

        // For Bar Graph: Total Course Applicants by Nationality
        $data['total_course_app'] = $this->course_applicants_model->course_applicants_per_nationality($ac_details['uni_id']);
        $this->load->view('internal/templates/header', $data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/level_2/academic_counsellor/ac_dashboard_view');
        $this->load->view('internal/templates/footer');
    }

}
