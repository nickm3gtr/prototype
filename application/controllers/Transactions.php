<?php

	class Transactions extends CI_Controller {

		public function __construct() {

			parent::__construct();
			$this->load->library('form_validation');
		}

		public function add_transaction($customerID = NULL) {

			$data['title'] = "Add transaction";

			$this->load->view('templates/cust_header', $data);
			$this->load->view('transaction/add_transaction', $data);
			$this->load->view('templates/footer');
		}

		public function insert_transaction($customerID = NULL) {

			$this->form_validation->set_rules('customerID', 'customerID', 'trim|required');
			$this->form_validation->set_rules('date', 'Date', 'trim|required|alpha_dash');
			$this->form_validation->set_rules('transdesc', 'Transaction description', 'required');
			$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric');

			if($this->form_validation->run()) {

				$transaction = array(
					'customerID' => $this->input->post('customerID'),
					'transDate' => $this->input->post('date'),
					'transDesc' => $this->input->post('transdesc'),
					'transAmount' => $this->input->post('amount'),
					'trans_status' => 'not journalized'
				);

				$this->transactions_model->insert_transaction($transaction);
				redirect('transactions/view_transaction/' . $transaction['customerID']);

			} else {

				$data['title'] = "Add transaction";

				$this->load->view('templates/cust_header', $data);
				$this->load->view('transaction/add_transaction', $data);
				$this->load->view('templates/footer');
			}

		}

		public function view_transaction($customerID = NULL) {

			$data['title'] = 'Your transactions';
			$data['customerID'] = $customerID;
			$data['transactions'] = $this->transactions_model->trans_select($customerID);

			if(empty($data['transactions'])) {

				$data['title'] = 'Your transactions';
				$data['customerID'] = $customerID;
				$data['transactions'] = $this->transactions_model->trans_select($customerID);

				$this->load->view('templates/cust_header', $data);
				$this->load->view('transaction/customer_emptyTransactions', $data);
				$this->load->view('templates/footer');
			} else {

				$this->load->view('templates/cust_header', $data);
				$this->load->view('transaction/customer_transactions', $data);
				$this->load->view('templates/footer');
			}
		}

		public function customer_filter_transactions($customerID = NULL) {

			$data['customerID'] = $customerID;
			$data['clients'] = $this->transactions_model->get_client($customerID);
			$data['title'] = "Transactions";
			$data['transactions'] = $this->transactions_model->trans_select($customerID);

			$month = $this->input->post('months');
			$year = $this->input->post('year');
			$data['clients'] = $this->transactions_model->get_client($customerID);
			$data['title'] = "Transactions";
			$data['transactions'] = $this->transactions_model->filter_trans($customerID, $month, $year);

			if(empty($data['transactions'])) {
				$data['clients'] = $this->transactions_model->get_client($customerID);
				$data['title'] = "Transactions";
				$data['transactions'] = $this->transactions_model->trans_select($customerID);

				$this->load->view('templates/cust_header', $data);
				$this->load->view('transaction/customer_emptyTransactions', $data);
				$this->load->view('templates/footer');
			} else {

				$this->load->view('templates/cust_header', $data);
				$this->load->view('transaction/customer_transactions', $data);
				$this->load->view('templates/footer');
			}
		}

		public function clients() {

			$data['title'] = 'Select Client';
			$data['clients'] = $this->transactions_model->clients_select();

			$this->load->view('templates/header', $data);
			$this->load->view('transaction/view_clients', $data);
			$this->load->view('templates/footer');
		}

		public function user_transactions($customerID = NULL) {

			$data['clients'] = $this->transactions_model->get_client($customerID);
			$data['title'] = "Transactions";
			$data['transactions'] = $this->transactions_model->trans_select($customerID);

			if(empty($data['transactions'])) {
				$data['clients'] = $this->transactions_model->get_client($customerID);
				$data['title'] = "Transactions";
				$data['transactions'] = $this->transactions_model->trans_select($customerID);

				$this->load->view('templates/header', $data);
				$this->load->view('transaction/empty_transaction', $data);
				$this->load->view('templates/footer');
			}

			$this->load->view('templates/header', $data);
			$this->load->view('transaction/view_transaction', $data);
			$this->load->view('templates/footer');
		}

		public function filter_transactions($customerID = NULL) {

			$data['clients'] = $this->transactions_model->get_client($customerID);
			$data['title'] = "Transactions";
			$data['transactions'] = $this->transactions_model->trans_select($customerID);

			$month = $this->input->post('months');
			$year = $this->input->post('year');
			$data['clients'] = $this->transactions_model->get_client($customerID);
			$data['title'] = "Transactions";
			$data['transactions'] = $this->transactions_model->filter_trans($customerID, $month, $year);

			if(empty($data['transactions'])) {
				$data['clients'] = $this->transactions_model->get_client($customerID);
				$data['title'] = "Transactions";
				$data['transactions'] = $this->transactions_model->trans_select($customerID);

				$this->load->view('templates/header', $data);
				$this->load->view('transaction/empty_transaction', $data);
				$this->load->view('templates/footer');
			} else {

				$this->load->view('templates/header', $data);
				$this->load->view('transaction/view_transaction', $data);
				$this->load->view('templates/footer');
			}
		}

		public function journal_transactions($transID = NULL) {

			$data['title'] = "Add journal";
			$data['account_titles'] = $this->transactions_model->account_titles();
			$data['transactions'] = $this->transactions_model->get_transaction($transID);

			$this->load->view('templates/header', $data);
			$this->load->view('transaction/input_journal', $data);
			$this->load->view('templates/footer');
		}

		public function journal_added($transID = NULL) {

			$null_accountTitle = $this->input->post('debit_account_titles');

			if($null_accountTitle != 0) {

				$this->form_validation->set_rules('debit_amount', 'Debit amount', 'required|integer');
				$this->form_validation->set_rules('credit_amount', 'Credit amount', 'required|integer');

				if($this->form_validation->run()) {

					$debit = array(
					'transID' => $this->input->post('debit_transID'),
					'user_id' => $this->input->post('debit_userID'),
					'acct_id' => $this->input->post('debit_account_titles'),
					'amount' => $this->input->post('debit_amount'),
					'date' => $this->input->post('debit_date')
					);

					$credit = array(
					'transID' => $this->input->post('credit_transID'),
					'user_id' => $this->input->post('credit_userID'),
					'acct_id' => $this->input->post('credit_account_titles'),
					'amount' => $this->input->post('credit_amount'),
					'date' => $this->input->post('credit_date')
					);

					if($debit['amount'] != $credit['amount']) {

						$this->session->set_flashdata('unbalanced', 'Unbalanced debit and credit!');
						redirect('transactions/journal_transactions/' . $debit['transID'], 'refresh');
					} else {
						$transID=$debit['transID'];
						$this->transactions_model->update_status($transID);
						$this->transactions_model->add_journal($debit, $credit);
						redirect('transactions/journal_result/' . $debit['transID']);
					}

				} else {

					$data['title'] = "Add journal";
					$data['account_titles'] = $this->transactions_model->account_titles();
					$data['transactions'] = $this->transactions_model->get_transaction($transID);

					$this->load->view('templates/header', $data);
					$this->load->view('transaction/input_journal', $data);
					$this->load->view('templates/footer');
				} 
			} else {
				$this->session->set_flashdata('error_journal', 'Please select account title.');

				$data['title'] = "Add journal";
				$data['account_titles'] = $this->transactions_model->account_titles();
				$data['transactions'] = $this->transactions_model->get_transaction($transID);

				$this->load->view('templates/header', $data);
				$this->load->view('transaction/input_journal', $data);
				$this->load->view('templates/footer');
			}
		}

		public function journal_result($transID) {

			$data['title'] = "Journal added";
			$data['debits'] = $this->transactions_model->get_debit($transID);
			$data['credits'] = $this->transactions_model->get_credit($transID);

			$this->load->view('templates/header', $data);
			$this->load->view('transaction/journal_result', $data);
			$this->load->view('templates/footer');
		}
	}
