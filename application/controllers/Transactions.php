<?php

	class Transactions extends CI_Controller {

		public function clients() {

			$data['title'] = 'Clients';
			$data['clients'] = $this->transactions_model->clients_select();

			$this->load->view('templates/header', $data);
			$this->load->view('transaction/view_clients', $data);
			$this->load->view('templates/footer');
		}

		public function view_transactions($customerID = NULL) {

			$data['clients'] = $this->transactions_model->get_client($customerID);
			$data['title'] = "Transactions";
			$data['transactions'] = $this->transactions_model->trans_select($customerID);

			$this->load->view('templates/header', $data);
			$this->load->view('transaction/view_transaction', $data);
			$this->load->view('templates/footer');
		}

		public function filter_transactions($customerID = NULL) {

			$data['clients'] = $this->transactions_model->get_client($customerID);
			$data['title'] = "Transactions";
			$this->load->view('templates/header', $data);
			$this->load->view('transaction/view_transaction', $data);
			$this->load->view('templates/footer');
		}
	}