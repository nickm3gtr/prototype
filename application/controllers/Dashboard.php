<?php

	class Dashboard extends CI_Controller {

		public function index() {

			$data['title'] = 'Dashoard';
			$data['client_count'] = $this->dashboard_model->get_clients_count();

			$this->load->view('templates/header', $data);
			$this->load->view('dashboard/dashboard_view', $data);
			$this->load->view('templates/footer');
		}

		public function customer_dashboard() {

			$data['title'] = 'Dashoard';
			$data['users_count'] = $this->dashboard_model->get_users_count();

			$this->load->view('templates/cust_header', $data);
			$this->load->view('dashboard/customer_view', $data);
			$this->load->view('templates/footer');
		}
	}