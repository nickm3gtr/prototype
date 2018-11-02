<?php

	class Transactions_model extends CI_Model {

		public function insert_transaction($transaction) {

			$this->db->insert('transactions', $transaction);
		}

		public function clients_select() {

			$this->db->select('customerID, CONCAT(cust_lname, ", ", cust_fname) AS name, cust_email');
			$this->db->from('customers');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_client($customerID) {

			$this->db->select('customerID, CONCAT(cust_fname, " " ,cust_lname) AS name');
			$this->db->from('customers');
			$this->db->where('customerID', $customerID);
			$query = $this->db->get();
			return $query->row_array();
		}

		public function account_titles() {

			$this->db->select('*');
			$this->db->from('account_titles');
			$this->db->order_by('acct_name');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function trans_select($customerID) {
			
			$query = $this->db->get_where('transactions', array('customerID' => $customerID));
			return $query->result_array();
		}

		public function filter_trans($customerID, $month, $year) {

			$date1 = $year .'-' .$month .'-01';
			$date2 = $year .'-' .$month .'-31';
			$this->db->select('customerID, transDesc, transDate, trans_status');
			$this->db->from('transactions');
			$this->db->where('customerID', $customerID);
			$this->db->where('transdate >=', $date1);
			$this->db->where('transdate <=', $date2);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_transaction($transID) {

			$query = $this->db->get_where('transactions', array('transID' => $transID));
			return $query->row_array();
		}

		public function update_status($transID) {

			$this->db->set('trans_status', 'journalized');
			$this->db->where('transID', $transID);
			$this->db->update('transactions');
		}

		public function add_journal($debit, $credit) {
			$this->db->insert('debits', $debit);
			$this->db->insert('credits', $credit);
		}

		public function get_debit($transID) {

			$this->db->select('*');
			$this->db->from('account_titles');
			$this->db->join('debits', 'account_titles.acct_id = debits.acct_id', 'inner');
			$this->db->join('transactions', 'debits.transID=transactions.transID');
			$this->db->where('debits.transID', $transID);
			$query = $this->db->get();
			return $query->row_array();
		}

		public function get_credit($transID) {

			$this->db->select('*');
			$this->db->from('account_titles');
			$this->db->join('credits', 'account_titles.acct_id = credits.acct_id', 'inner');
			$this->db->join('transactions', 'credits.transID=transactions.transID');
			$this->db->where('credits.transID', $transID);
			$query = $this->db->get();
			return $query->row_array();
		}
	}