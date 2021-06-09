<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ea_course_application extends CI_Controller 
{

    public function __construct()
	{
		parent::__construct();
	
        $this->load->model(['user_model','course_applicants_model','universities_model','courses_model']);
        $this->load->library('form_validation');
        $this->load->helper('form');
        // Checks if session is set and if user is signed in as Level 2 user (authorised access). If not, deny his/her access.
        if (!$this->session->userdata('user_id') || !$this->session->userdata('user_role'))
        {  
            redirect('user/login/Auth/login');
        }
	}

    public function index()
    {
        $data['title']= 'iJEES | Course Application';
        $data['include_js'] ='ea_course_application_list';
        $user_id=$this->session->userdata('user_id');
        $data['course_applicants']=$this->course_applicants_model->get_user_id($user_id);
        
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/level_2/education_agent/ea_course_application_list_view');
        $this->load->view('internal/templates/footer');  
    }

    public function add_course_application()
    {
        $data['title']= 'iJEES | Add Student Application';
        $data['include_js'] ='ea_course_application_add';
        $data['users']=$this->user_model->search_email();
        $data['university_data'] = $this->universities_model->select_all_approved_only(); 
      
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $this->load->view('internal/level_2/education_agent/ea_course_application_add_view',$data);
        $this->load->view('internal/templates/footer');  
    }

    function fetch_courses()
	{
	  echo $this->courses_model->fetch_courses_id($this->input->post('uni_id'));
	}

    public function upload_doc($path, $file_input_name) 
    {
        if ($_FILES){
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_input_name)) 
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert" id="alert_message">
                The file format is not correct</div>');
               // redirect('internal/level_2/ea_course_application/submit_added_registration_page');
            } else {
                $doc_data = ($this->upload->data());
                return $doc_data;
            }   
        }
    }

    public function submit_added_course_applicant()
    {
        $data['title']="iJEES | Course Applicant Registration";
        $get_course_id=$this->courses_model->fetch_courses_id($this->input->post('uni_id'));
        $this->form_validation->set_rules('c_applicant_phonenumber','Phone Number', 'required|trim|min_length[5]',[
            'min_length'=> 'Phone number too short'
        ]);
        $this->form_validation->set_rules('c_applicant_email','Email', 'required|trim|valid_email|is_unique[course_applicants.c_applicant_email]',[
            'is_unique'=>'This email has already registered!'
        ]);

        $this->form_validation->set_rules('c_applicant_identification','Identification', 'required|trim|is_unique[course_applicants.c_applicant_identification]',[
            'is_unique'=>'This identification has already registered!'
        ]);

        if($this->form_validation->run()== false)
        {
            $data['title']="iJEES | Course Applicant Registration";
            $data['include_css']="forms";
            $this->load->view('internal/templates/header',$data);
            $this->load->view('internal/templates/sidenav',$data);
            $this->load->view('internal/templates/topbar',$data);
            $this->load->view('internal/level_2/education_agent/ea_course_application_add_view',$data);
            $this->load->view('internal/templates/footer'); 
        }
        else
        {
            
            $c_applicant_document= $this->upload_doc('./assets/uploads/course_applicant_form', 'c_applicant_document');
            $user_id=$this->session->userdata('user_id');
            $data=
            [
                'c_applicant_method'=>$user_id,
                'c_applicant_fname'=>htmlspecialchars($this->input->post('c_applicant_fname',true)),
                'c_applicant_lname'=>htmlspecialchars($this->input->post('c_applicant_lname',true)),
                'c_applicant_phonenumber'=>htmlspecialchars($this->input->post('c_applicant_phonenumber',true)),
                'c_applicant_email'=>htmlspecialchars($this->input->post('c_applicant_email',true)),
                'c_applicant_nationality'=>htmlspecialchars($this->input->post('c_applicant_nationality',true)),
                'c_applicant_gender'=>htmlspecialchars($this->input->post('c_applicant_gender',true)),
                'c_applicant_dob'=>htmlspecialchars($this->input->post('c_applicant_dob',true)),
                'c_applicant_currentlevel'=>htmlspecialchars($this->input->post('c_applicant_currentlevel',true)),
                'c_applicant_address'=>htmlspecialchars($this->input->post('c_applicant_address',true)),
                'c_applicant_identification'=>htmlspecialchars($this->input->post('c_applicant_identification',true)),
                'course_id'=>htmlspecialchars($this->input->post('course1_id',true)),
                'c_applicant_document'=>$c_applicant_document['file_name'],
                
            ];

             // insert data into database
            $this->course_applicants_model->insert($data);

        $this->session->set_flashdata('insert_message', 1); 
        $this->session->set_flashdata('c_applicant_fname', $this->input->post('c_applicant_fname')); 

        redirect('internal/level_2/education_agent/ea_course_application');
        }
        
    }

    // function submit_added_course_applicant($uni_id)
    // {
    //     $data=
	// 	[
    //         'uni_id'=>$uni_id,
	// 		'course_name'=>htmlspecialchars($this->input->post('course_name')),
	// 		'course_area'=>htmlspecialchars($this->input->post('course_area')),
	// 		'course_level'=>htmlspecialchars($this->input->post('course_level')),
	// 		'course_duration'=>htmlspecialchars($this->input->post('course_duration')),
	// 		'course_fee'=>htmlspecialchars($this->input->post('course_fee')),
	// 		'course_shortprofile'=>htmlspecialchars($this->input->post('course_shortprofile')),
	// 		'course_requirements'=>htmlspecialchars($this->input->post('course_requirements')),
	// 		'course_country'=>htmlspecialchars($this->input->post('course_country')),
    //         'course_intake'=>htmlspecialchars($this->input->post('course_intake')),
    //         'course_careeropportunities'=>htmlspecialchars($this->input->post('course_careeropportunities')),
	// 	];

    //     $this->courses_model->insert($data);
    //     $this->session->set_flashdata('insert_message', 1); 
    //     $this->session->set_flashdata('c_applicant_id', $c_applicant_id); 

    //     redirect('internal/level_2/educational_partner/ep_courses');
    // }
  
   public function course_application_list()
   {
       // Datatables Variables
       $draw = intval($this->input->get("draw"));
       $start = intval($this->input->get("start"));
       $length = intval($this->input->get("length"));

       $course_applicants=$this->course_applicants_model->get_user_id($this->session->userdata('user_id'));
       $counter = 1;

       $data = array();
       $base_url = base_url();

       foreach($course_applicants as $ca) {
          $edit_link = $base_url."internal/level_2/education_agent/ea_course_application/edit_course_applicant/".$ca->c_applicant_id;

          $delete = '<span><button type="button" onclick="delete_course_applicant('.$ca->c_applicant_id.')" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" ><span class="fas fa-trash"></span></button></span>';
          $edit_opt = '<span class = "px-1"><a type="button" href = "'.$edit_link.'"class="btn icon-btn btn-xs btn-primary waves-effect waves-light"><span class="fas fa-pencil-alt"></span></a></span>';
          $view = '<span><button type="button" onclick="view_course_applicant('.$ca->c_applicant_id.')" class="btn icon-btn btn-xs btn-info waves-effect waves-light" data-toggle="modal" data-target="#view_course_application"><span class="fas fa-eye"></span></button></span>';
         
         $function = $view.$edit_opt.$delete;
           
          $data[] = array(
               $counter,
               $ca->c_applicant_fname,
               $ca->c_applicant_lname,
               $ca->c_applicant_nationality,
               $ca->c_applicant_currentlevel,
               $ca->c_app_submitdate,
               $function,
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

   function edit_course_applicant($c_applicant_id)
    {
        $data['title'] = 'iJEES | Edit Course Application Form';
        $data['edit_course_applicant']=$this->course_applicants_model->get_cas_with_id($c_applicant_id);
        
		$this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/level_2/education_agent/ea_course_applicant_edit_view');
        $this->load->view('internal/templates/footer'); 
    }

    function submit_edit_course_applicant($c_applicant_id)
    {
        $data['title']="iJEES | Course Applicant Registration";

        if($_FILES['c_applicant_document']['name'] != "") {
			$c_applicant_document = $this->upload_doc('./assets/uploads/course_applicant_form', 'c_applicant_document');
			$data = [
				'c_applicant_document' =>$c_applicant_document['file_name'],
			];
			$this->course_applicants_model->update($data, $c_applicant_id);
		}

            $user_id=$this->session->userdata('user_id');
            $data=
            [
                'c_applicant_method'=>$user_id,
                'c_applicant_fname'=>htmlspecialchars($this->input->post('c_applicant_fname',true)),
                'c_applicant_lname'=>htmlspecialchars($this->input->post('c_applicant_lname',true)),
                'c_applicant_phonenumber'=>htmlspecialchars($this->input->post('c_applicant_phonenumber',true)),
                'c_applicant_email'=>htmlspecialchars($this->input->post('c_applicant_email',true)),
                'c_applicant_nationality'=>htmlspecialchars($this->input->post('c_applicant_nationality',true)),
                'c_applicant_gender'=>htmlspecialchars($this->input->post('c_applicant_gender',true)),
                'c_applicant_dob'=>htmlspecialchars($this->input->post('c_applicant_dob',true)),
                'c_applicant_currentlevel'=>htmlspecialchars($this->input->post('c_applicant_currentlevel',true)),
                'c_applicant_address'=>htmlspecialchars($this->input->post('c_applicant_address',true)),
                'c_applicant_identification'=>htmlspecialchars($this->input->post('c_applicant_identification',true)),
                
            ];

        $this->course_applicants_model->update($data, $c_applicant_id);
       
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert" id="alert_message">
        You have updated successfully</div>');

        $this->session->set_flashdata('edit_message', 1); 
        $this->session->set_flashdata('c_applicant_fname', $this->input->post('c_applicant_fname')); 

        redirect('internal/level_2/education_agent/ea_course_application');

    }
    

    function delete_course_applicant()
    {
        $this->course_applicants_model->delete($this->input->post('c_applicant_id'));
    }

    function view_course_applicant()
    {
       $ca_detail= $this->course_applicants_model->get_cas_id($this->input->post('c_applicant_id'));
    
       $output ='
        <table class="table table-striped" style = "border:0;">
            <tbody>
                <tr>
                    <th scope="row">First Name</th>
                    <td>'.$ca_detail->c_applicant_fname.'</td>
                </tr>
                <tr>
                    <th scope="row">Last Name</th>
                    <td>'.$ca_detail->c_applicant_lname.'</td>
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
                    <th scope="row">Identification</th>
                    <td>'.$ca_detail->c_applicant_identification.'</td>
                </tr>
                <tr>
                    <th scope="row">Submit Date</th>
                    <td>'.$ca_detail->c_app_submitdate.'</td>
                </tr>
                <tr>
                    <th scope="row">Document</th>
                    <td><a href="'.base_url("assets/uploads/course_applicant_form/").$ca_detail->c_applicant_document.'" target="_blank">'.$ca_detail->c_applicant_document.'</a></td>
            </tbody>
        </table>';

        echo $output;
    }
}

?>