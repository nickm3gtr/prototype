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
			$data['title'] = "Ledger";

			$data['debits'] = $this->ledger_model->get_debitLedger($customerID, $account_id, $year, $month);
			$data['credits'] = $this->ledger_model->get_creditLedger($customerID, $account_id, $year, $month);
			
			$this->load->view('templates/cust_header', $data);
			$this->load->view('ledger/ledger_result', $data);
			$this->load->view('templates/footer');
		}
	}