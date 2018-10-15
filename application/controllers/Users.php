<?php

class Users Extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('user_model');
	}

	public function register() {

		$this->load->view('user/register');
	}

	public function signup_validation() {

		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('repassword', 'Confirm Password', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');

		if($this->form_validation->run()) {

			$password = md5($this->input->post('password'));
			$confirm_password = md5($this->input->post('repassword'));
			 if($password == $confirm_password) {

			 	$user = array(

					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'gender' => $this->input->post('gender'),

				);
			 } else {
			 	$this->session->set_flashdata('error_msg', "Password doesn't match.");
			 	redirect('users/register');
			 }


			$email_check = $this->user_model->email_check($user);

			if($email_check) {

				$this->user_model->register_user($user);
				$this->session->set_flashdata('success_msg', 'Registered successfully. Now login to your account.');
				redirect('users/index');
			} else {

				$this->session->set_flashdata('error_msg', 'Please try another email.');
				redirect('users/register');
			}

		} else {

			$this->load->view('user/register');
		
		}

	}

	public function index() {

		$this->load->view('user/login');
	}

	public function login_validation() {

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password' ,'required');

		if($this->form_validation->run()) {

			$result = array(

			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password'))

			);

			$user_check = $this->user_model->login_user($result['email'], $result['password']);
			
			if($user_check) {

				$session_data  = $this->user_model->login_user($result['email'], $result['password']);
				$this->session->set_userdata($session_data);
				//print_r($session_data);
				redirect(base_url() . 'index.php/pages/home');
			} else {

				$this->index();
			}


		} else {

			$this->index();

		}
	}

	public function logout() {

		$this->session->unset_userdata('email');
		redirect(base_url() . 'index.php/users/index');
	}

	public function profile_view() {

		$email = $this->session->userdata('email');
		$this->load->model('User_model');
		$data['user_info'] = $this->user_model->profile_view($email);

		$data['title'] = 'User Profile';
		$this->load->view('templates/header', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('templates/footer');

	}
}