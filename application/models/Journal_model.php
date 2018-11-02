<?php

	class Journal_model extends CI_Model {

		public function get_journal($customerID) {

			$select = "(d.transID)as debit_id, (d.date)as debit_date, (d.acct_name)as debit_acctname, (d.amount)as debit, (c.transID)as 
				credit_id, (c.date)as credit_date, (c.acct_name)as credit_acctname, (c.amount)as credit";
			$from = "(SELECT debits.transID, debits.date, account_titles.acct_name, debits.amount 
					from account_titles INNER JOIN debits on account_titles.acct_id=debits.acct_id INNER JOIN transactions ON
					debits.transID=transactions.transID
					WHERE transactions.customerID=" . $customerID .")d";
			$join = "(SELECT credits.transID, credits.date, account_titles.acct_name, credits.amount 
					from account_titles INNER JOIN credits on account_titles.acct_id=credits.acct_id INNER JOIN transactions ON 
					credits.transID=transactions.transID
					WHERE transactions.customerID=" . $customerID .")c";

			$this->db->select($select);
			$this->db->from($from);
			$this->db->join($join, 'd.transID=c.transID');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function filter_journal($customerID, $month, $year) {

			$date1 = $year .'-' .$month .'-01';
			$date2 = $year .'-' .$month .'-31';

			$select = "(d.transID)as debit_id, (d.date)as debit_date, (d.acct_name)as debit_acctname, (d.amount)as debit, (c.transID)as 
				credit_id, (c.date)as credit_date, (c.acct_name)as credit_acctname, (c.amount)as credit";
			$from = "(SELECT debits.transID, debits.date, account_titles.acct_name, debits.amount 
					from account_titles INNER JOIN debits on account_titles.acct_id=debits.acct_id INNER JOIN transactions ON
					debits.transID=transactions.transID
					WHERE transactions.customerID=" . $customerID . " and debits.date >= '" . $date1 . "' and debits.date <= " . "'" . $date2 . "'" . ")d";
			$join = "(SELECT credits.transID, credits.date, account_titles.acct_name, credits.amount 
					from account_titles INNER JOIN credits on account_titles.acct_id=credits.acct_id INNER JOIN transactions ON 
					credits.transID=transactions.transID
					WHERE transactions.customerID=" . $customerID . " and credits.date >= '" . $date1 . "' and credits.date <= '" . $date2 . "')c";

			$this->db->select($select);
			$this->db->from($from);
			$this->db->join($join, 'd.transID=c.transID');
			$query = $this->db->get();
			return $query->result_array();
		}
	}