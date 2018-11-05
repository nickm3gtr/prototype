<?php

	class Transactions_model extends CI_Model {

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

		public function trans_select($customerID) {
			
			$query = $this->db->get_where('transactions', array('customerID' => $customerID));
			return $query->result_array();
		}

		public function filter_trans($customerID, $month, $year) {

			$date1 = $year .'-' .$month .'-01';
			$date2 = $year .'-' .$month .'-31';
			$this->db->select('customerID, transDesc, transDate');
			$this->db->from('transactions');
			$this->db->where('customerID', $customerID);
			$this->db->where('transdate >=', $date1);
			$this->db->where('transdate <=', $date2);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function insert_transaction($transaction) {

			$this->db->insert('transactions', $transaction);
		}

		public function account_titles() {

			$this->db->select('*');
			$this->db->from('account_titles');
			$this->db->join('categories', 'categories.categoryID = account_titles.categoryID', 'inner');
			$this->db->order_by('account_titles.categoryID, account_titles.acct_name');
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

			$query = $this->db->query("SELECT * FROM  account_titles INNER JOIN debits ON account_titles.acct_id=debits.acct_id INNER JOIN transactions on debits.transID=transactions.transID WHERE debits.transID='" .$transID ."'");

			return $query->row_array();
		}

		public function get_credit($transID) {

			$query = $this->db->query("SELECT * FROM  account_titles INNER JOIN credits ON account_titles.acct_id=credits.acct_id INNER JOIN transactions on credits.transID=transactions.transID WHERE credits.transID='" .$transID ."'");

			return $query->row_array();
		}
	}