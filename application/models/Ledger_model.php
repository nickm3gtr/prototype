<?php

	class Ledger_model extends CI_Model {
		
		public function get_accountTitles($customerID) {
			
			$query = $this->db->query("SELECT DISTINCT t.acct_id, t.acct_name FROM(SELECT account_titles.acct_id, account_titles.acct_name from account_titles INNER JOIN debits on account_titles.acct_id=debits.acct_id INNER JOIN transactions ON debits.transID=transactions.transID WHERE transactions.customerID='" .$customerID ."' GROUP BY account_titles.acct_name UNION ALL SELECT account_titles.acct_id, account_titles.acct_name from account_titles INNER JOIN credits on account_titles.acct_id=credits.acct_id INNER JOIN transactions ON credits.transID=transactions.transID WHERE transactions.customerID='" .$customerID ."' GROUP BY account_titles.acct_name)t");

			return $query->result_array();		
		}

		public function get_debitLedger($customerID, $account_id, $year, $month) {

			$date1 = $year .'-' .$month .'-01';
			$date2 = $year .'-' .$month .'-31';

			$query = $this->db->query("SELECT debits.transID, debits.date, account_titles.acct_name, debits.amount from account_titles INNER JOIN debits on account_titles.acct_id=debits.acct_id INNER JOIN transactions ON debits.transID=transactions.transID WHERE transactions.customerID=" .$customerID ." and debits.acct_id=".$account_id ." and debits.date>='" .$date1 ."' and debits.date<='" .$date2 ."'");
			return $query->result_array();
		}

		public function get_creditLedger($customerID, $account_id, $year, $month) {

			$date1 = $year .'-' .$month .'-01';
			$date2 = $year .'-' .$month .'-31';

			$query = $this->db->query("SELECT credits.transID, credits.date, account_titles.acct_name, credits.amount from account_titles INNER JOIN credits on account_titles.acct_id=credits.acct_id INNER JOIN transactions ON credits.transID=transactions.transID WHERE transactions.customerID=" .$customerID ." and credits.acct_id=".$account_id ." and credits.date>='" .$date1 ."' and credits.date<='" .$date2 ."'");
			return $query->result_array();
		}
	}