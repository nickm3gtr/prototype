<?php

	class Dashboard_model extends CI_Model {

		public function get_clients_count() {

			return $this->db->count_all('customers');
		}
	}