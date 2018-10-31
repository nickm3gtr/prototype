<?php

	class Dashboard extends CI_Controller {

		public function index() {

			$data['title'] = 'Dashoard';
			$data['client_count'] = $this->dashboard_model->get_clients_count();

			$this->load->view('templates/header', $data);
			$this->load->view('dashboard/dashboard_view', $data);
			$this->load->view('templates/footer');
		}
	}