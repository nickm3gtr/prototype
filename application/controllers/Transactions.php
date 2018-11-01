<?php

	class Transactions extends CI_Controller {

		public function clients() {

			$data['title'] = 'Select Client';
			$data['clients'] = $this->transactions_model->clients_select();

			$this->load->view('templates/header', $data);
			$this->load->view('transaction/view_clients', $data);
			$this->load->view('templates/footer');
		}

		public function view_transactions($customerID = NULL) {

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

		public function journal_added() {

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

				$this->transactions_model->add_journal($debit, $credit);
				redirect('transactions/journal_result/' . $debit['transID']);
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