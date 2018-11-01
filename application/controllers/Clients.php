<?php

	class Clients extends CI_Controller {

		public function __construct() {

			parent::__construct();
			$this->load->model('Clients_model');
		}

		public function clients_list() {

			$data['title'] = 'Clients';
			$data['clients'] = $this->clients_model->clients_select();

			$this->load->view('templates/header', $data);
			$this->load->view('client/clients_view', $data);
			$this->load->view('templates/footer');
		}

		public function client_profile($customerID = NULL) {

			$data['clients'] = $this->clients_model->get_client($customerID);
			$data['title'] = "Profile";
			$data['profile'] = $this->clients_model->profile_select($customerID);

			$this->load->view('templates/header', $data);
			$this->load->view('client/client_profile', $data);
			$this->load->view('templates/footer');
		}
	}