<?php

class User_model extends CI_Model {

	public function email_check($user) {

		$condition = "email =" . "'" . $user['email'] . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);

		$query = $this->db->get();

		if($query->num_rows()>0) {

			return false;

		} else {

			return true;
		}

	}

	public function register_user($user) {

		$this->db->insert('users', $user);
	}

	public function login_user($email, $password) {

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get();

		if($query->num_rows() > 0) {

			return $query->row_array();
		} else {
			return false;
		}

	}

	public function profile_view($email) {

		$query = $this->db->get_where('users', array('email' => $email));
		return $query->row_array(); 
	}
}