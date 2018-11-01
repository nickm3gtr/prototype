<?php

	class Customer_model extends CI_Model {

		public function email_check($customer) {

			$condition = "cust_email =" . "'" . $customer['cust_email'] . "'";
			$this->db->select('*');
			$this->db->from('customers');
			$this->db->where($condition);

			$query = $this->db->get();

			if($query->num_rows()>0) {

				return false;

			} else {

				return true;
			}

		}

		public function register_customer($customer) {

			$this->db->insert('customers', $customer);
		}

		public function login_customer($email, $password) {

			$this->db->select('*');
			$this->db->from('customers');
			$this->db->where('cust_email', $email);
			$this->db->where('cust_password', $password);
			$query = $this->db->get();

			if($query->num_rows() > 0) {

				return $query->row_array();
			} else {
				return false;
			}

		}
	}