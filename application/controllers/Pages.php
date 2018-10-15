<?php

	class Pages extends CI_Controller {

		public function home() {

		$data['title'] = 'Home';
		$this->load->view('templates/header', $data);
		$this->load->view('page/home', $data);
		$this->load->view('templates/footer');
		}

		public function about() {

		$data['title'] = 'About';
		$this->load->view('templates/header', $data);
		$this->load->view('page/about', $data);
		$this->load->view('templates/footer');
		}
	}