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
	}