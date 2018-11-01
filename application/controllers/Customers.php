<?php 
	
	class Customers extends CI_Controller {

		public function register() {

			$this->load->view('customer/register');
		}

		public function signup_validation() {

			$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('repassword', 'Confirm Password', 'trim|required|matches[password]');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required');

			if($this->form_validation->run()) {

				$customer = array(

						'cust_fname' => $this->input->post('firstname'),
						'cust_lname' => $this->input->post('lastname'),
						'cust_email' => $this->input->post('email'),
						'cust_password' => md5($this->input->post('password')),
						'cust_gender' => $this->input->post('gender'),

					);
				//print_r($customer);

				$email_check = $this->customer_model->email_check($customer);

				if($email_check) {

					$this->customer_model->register_customer($customer);
					$this->session->set_flashdata('success_msg', 'Registered successfully. Now login to your account.');
					redirect('customers/login');
				} else {

					$this->session->set_flashdata('error_msg', 'Please try another email.');
					redirect('customers/register');
				}
			} else {

				$this->load->view('customer/register');
			}
		}

		public function login() {

			$this->load->view('customer/login');
		}

		public function login_validation() {

			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password' ,'trim|required');

			if($this->form_validation->run()) {

				$result = array(

				'cust_email' => $this->input->post('email'),
				'cust_password' => md5($this->input->post('password'))

				);

				$customer_check = $this->customer_model->login_customer($result['cust_email'], $result['cust_password']);
				
				if($customer_check) {

					$data  = $this->customer_model->login_customer($result['cust_email'], $result['cust_password']);
					$this->session->set_userdata($data);
					redirect(base_url() . 'index.php/dashboard/customer_dashboard');
				} else {

					$this->session->set_flashdata('error_msg', 'Wrong email or password.');
					$this->login();
				}
				
			} else {

				$this->login();

			}
		}

		public function logout() {

			$this->session->unset_userdata('cust_email');
			redirect(base_url() . 'index.php/customers/login');
		}
	}