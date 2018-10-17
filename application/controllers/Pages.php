<?php

	class Pages extends CI_Controller {

		public function dashboard() {

			$data['title'] = 'Dashoard';
			$this->load->view('templates/header', $data);
			$this->load->view('page/dashboard', $data);
			$this->load->view('templates/footer');
		}

		public function about() {

			$data['title'] = 'About';
			$this->load->view('templates/header', $data);
			$this->load->view('page/about', $data);
			$this->load->view('templates/footer');
		}

		public function account_titles() {

			$data['title'] = 'Account Titles';
			$this->load->view('templates/header', $data);
			$this->load->view('page/account_titles');
			$this->load->view('templates/footer');
		}
	}