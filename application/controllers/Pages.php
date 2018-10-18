<?php

	class Pages extends CI_Controller {

		public function dashboard() {

			$data['title'] = 'Dashoard';
			$this->load->view('templates/header', $data);
			$this->load->view('page/dashboard', $data);
			$this->load->view('templates/footer');
		}

		public function about() {

			$data['title'] = 'About';
			$this->load->view('templates/header', $data);
			$this->load->view('page/about', $data);
			$this->load->view('templates/footer');
		}

		public function account_titles() {

			$data['title'] = 'Account Titles';
			$data['categories'] = $this->acctitle_model->category_select();
			$data['account_titles'] = $this->acctitle_model->account_titles();

			$this->load->view('templates/header', $data);
			$this->load->view('page/account/account_titles', $data);
			$this->load->view('templates/footer');
		}

		public function acctitle_check() {

			$category = $this->input->post('category');
			$data['title'] = 'Account Titles';
			$data['categories'] = $this->acctitle_model->category_select();
			$data['filter'] = $this->acctitle_model->category_filter($category);

			$this->load->view('templates/header', $data);
			$this->load->view('page/account/account_titles_filter', $data);
			$this->load->view('templates/footer');

		}

		public function add_acctitle() {

			$data['categories'] = $this->acctitle_model->category_select();

			$data['title'] = 'Add Account Title';
			$this->load->view('templates/header', $data);
			$this->load->view('page/account/add_acctitle', $data);
			$this->load->view('templates/footer');
		}

		public function acctitle_insert() {

			$new_acctitle = array(
				'acct_code' => $this->input->post('account_code'),
				'acct_name' => $this->input->post('account_title'),
				'categoryID' => $this->input->post('category')
			);
			$this->acctitle_model->acctitle_insert($new_acctitle);
			redirect('pages/account_titles');
		}
	}