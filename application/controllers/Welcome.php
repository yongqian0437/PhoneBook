<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('welcome_message');
		$data['include_js'] = 'file_name'; // js file that is specific to ur page. ignore file extension (.js)
		$data['include_css'] = 'file_name'; // css file that is specific to ur page. ignore file extension (.css)
		$this->load->view('external/templates/header');
		$this->load->view('external/templates/footer');
		// $this->load->view('external/university_form_view');
		$this->load->view('user/registration/courses_applicant_registration_view');
		// $this->load->view('user/registration/ac_registration_view');
	}
}
