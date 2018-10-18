<?php

	class Acctitle_model extends CI_Model {

		public function category_select() {

			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function account_titles() {
			$this->db->select('*');
			$this->db->from('account_titles');
			$this->db->join('categories', 'categories.categoryID = account_titles.categoryID', 'inner');
			$query = $this->db->get();

			return $query->result_array();
		}

		public function category_filter($category = 'Categories') {

			if($category === 'Categories') {

				$this->db->select('*');
				$this->db->from('account_titles');
				$this->db->join('categories', 'categories.categoryID = account_titles.categoryID', 'inner');
				$query = $this->db->get();
				return $query->result_array();
			}

			$this->db->select('*');
			$this->db->from('account_titles');
			$this->db->join('categories', 'categories.categoryID = account_titles.categoryID', 'inner');
			$this->db->where('account_titles.categoryID', $category);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function acctitle_insert($new_acctitle) {

			$this->db->insert('account_titles', $new_acctitle);
		}
	}