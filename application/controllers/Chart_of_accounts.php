<?php

	class Chart_of_accounts extends CI_Controller {

		public function account_titles() {

			$data['title'] = 'Account Titles';
			$data['categories'] = $this->acctitle_model->category_select();
			$data['account_titles'] = $this->acctitle_model->account_titles();

			$this->load->view('templates/header', $data);
			$this->load->view('chart_of_accounts/account_titles', $data);
			$this->load->view('templates/footer');
		}

		public function acctitle_filter() {

			$category = $this->input->post('category');
			$data['title'] = 'Account Titles';
			$data['categories'] = $this->acctitle_model->category_select();
			$data['filter'] = $this->acctitle_model->category_filter($category);

			if(empty($data['filter'])) {

				$data['title'] = 'Account Titles';
				$data['categories'] = $this->acctitle_model->category_select();
				$data['account_titles'] = $this->acctitle_model->account_titles();

				$this->load->view('templates/header', $data);
				$this->load->view('chart_of_accounts/empty_chart_of_accounts', $data);
				$this->load->view('templates/footer');
			}

			$this->load->view('templates/header', $data);
			$this->load->view('chart_of_accounts/account_titles_filter', $data);
			$this->load->view('templates/footer');

		}

		public function add_acctitle() {

			$data['categories'] = $this->acctitle_model->category_select();

			$data['title'] = 'Add Account Title';
			$this->load->view('templates/header', $data);
			$this->load->view('chart_of_accounts/add_acctitle', $data);
			$this->load->view('templates/footer');
		}

		public function acctitle_insert() {

			$new_acctitle = array(
				'acct_code' => $this->input->post('account_code'),
				'acct_name' => $this->input->post('account_title'),
				'categoryID' => $this->input->post('category')
			);
			$this->acctitle_model->acctitle_insert($new_acctitle);
			redirect('Chart_of_accounts/account_titles');
		}
	}