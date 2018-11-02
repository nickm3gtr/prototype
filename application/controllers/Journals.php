<?php

	class Journals extends CI_Controller {

		public function journal_view($customerID = NULL) {

			$data['title'] = "General Journal";
			$data['results'] = $this->journal_model->get_journal($customerID);

			$this->load->view('templates/cust_header', $data);
			$this->load->view('journal/view_journal', $data);
			$this->load->view('templates/footer');
		}

		public function journal_filter($customerID = NULL) {

			$month = $this->input->post('months');
			$year = $this->input->post('year');

			$data['title'] = "General Journal";
			$data['results'] = $this->journal_model->filter_journal($customerID, $month, $year);

			$this->load->view('templates/cust_header', $data);
			$this->load->view('journal/view_journal', $data);
			$this->load->view('templates/footer');
		}
	}