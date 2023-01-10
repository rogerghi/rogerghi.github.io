<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
   public function __construct($config = 'rest') {
        parent::__construct();
        $this->load->model('Login_model');
        
    }

	public function index()
	{

		$this->form_validation->set_rules('email', 'Email', 'required|min_length[6]|max_length[50]|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[5]|max_length[255]');	
		if ($this->form_validation->run() == TRUE ) {

			$email 	= $_POST['email'];
			$pass 	= md5($_POST['pass']);

			$user = $this->Login_model->login_funct($email,$pass);
			if ($user->email) {

				$_SESSION['logged_in'] = TRUE;
				$_SESSION['username'] = $user->name;
				$_SESSION['user_id'] = $user->user_id;

				redirect("app/landing","refresh");
			}else{
				$this->session->set_flashdata('error','account dosent exist');
				// redirect("login","refresh");
			}

		}



		$this->load->view('includes/header_login');
		$this->load->view('login');
		$this->load->view('includes/footer_login');
	}
	public function register()
	{

		if (isset($_POST['register'])) {
			$this->form_validation->set_rules('name_reg', 'Username', 'required');
			$this->form_validation->set_rules('pass_reg', 'Password', 'required|min_length[5]|max_length[255]');
			$this->form_validation->set_rules('pass_reg_2', 'Password Confirmation', 'required|matches[pass_reg]');
			$this->form_validation->set_rules('email_reg', 'Email', 'required|min_length[6]|max_length[50]|valid_email');
			
			if ($this->form_validation->run() == TRUE ) {
				$data = array(
					'name' => $_POST['name_reg'],
					'password' => md5($_POST['pass_reg']),
					'email' => $_POST['email_reg'],
					'created_date' => date('Y-m-d')
					
				);
				$this->Login_model->create_user($data);
				$this->session->set_flashdata("success", "Your account has been registered.");
				redirect("login","refresh");
			}

		}
		$this->load->view('includes/header_login');
		$this->load->view('register');
		$this->load->view('includes/footer_login');
	}
	public function logout()
	{
		session_destroy();
		// unset($_SESSION);
		redirect("login","refresh");
	}
}
