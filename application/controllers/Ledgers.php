<?php

	class Ledgers extends CI_Controller {

		public function view_ledger($customerID = NULL) {

			$data['title'] = "Ledger";
			$data['account_titles'] = $this->ledger_model->get_accountTitles($customerID);

			$this->load->view('templates/cust_header', $data);
			$this->load->view('ledger/ledger_view', $data);
			$this->load->view('templates/footer');
		}

		public function ledger_result($customerID = NULL) {

			$account_id = $this->input->post('account_titles');
			$year = $this->input->post('year');
			$month = $this->input->post('months');
			$data['debit_ledgers'] = $this->ledger_model->get_ledger($customerID, $account_id, $year, $month);
			print_r($data['debit_ledgers']);
		}
	}