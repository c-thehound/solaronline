<?php
class Books extends CI_Controller {
	public function __contstruct() {
		parent::__construct();
	}

	public function register_book($success = null) {
		$data['title'] = 'Register Book';
		$data['active'] = 'register_book';
		$data['success'] = $success;
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('lme_model');
		$this->load->model('stoves/builders_model');
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		$data['portal'] = $this->session->userdata('portal');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/lme');
		}
		if ($data['portal'] === 'stoves') {
			$data['builders'] = $this->builders_model->get_all_builders();
		} else if($data['portal'] === 'solar') {
			$data['lmes'] = $this->lme_model->get_all_lmes();
		}
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/register_book', $data);
		$this->load->view('templates/footer');
	}

	public function save_book() {
		$this->load->model('books_model');
		$this->books_model->add_book();
	}

	function view_books ($success = null) {
		$this->load->model('books_model');
		$data['title'] = 'View Books';
		$data['active'] = 'view_books';
		$data['success'] = $success;
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		$this->load->helper('url');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/lme');
		}
		$data['books'] = $this->books_model->get_all_books();
		$data['portal'] = $this->session->userdata('portal');
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/view_books', $data);
		$this->load->view('templates/footer');
	}

	function delete_book ($id) {
		$this->load->model('books_model');
		$this->books_model->delete_book($id);
	}
}
?>