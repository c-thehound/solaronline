<?php
class Add extends CI_Controller {
	public function __contstruct() {
		parent::__contstruct();
	}

	public function index() {
		$data['title'] = 'Add Data';
		$this->load->library('session');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	}

	public function add_lme($success = null) {
		$this->load->model('lme_model');
		$this->load->helper('form');
		$data['title'] = 'Add LME';
		$this->load->library('session');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/add_lme');
		}
		$data['portal'] = $this->session->userdata('portal');
		$data['active'] = 'add_lme';
		$data['success'] = $success;
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$data['categories'] = $this->lme_model->get_all_categories();
		$data['coordinators'] = $this->lme_model->get_all_coordinators();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/add_lme');
		$this->load->view('templates/footer');
	}

	public function add_coordinator($success = null) {
		$data['title'] = 'Add Co-ordinator';
		$data['active'] = 'add_coordinator';
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		$this->load->helper('url');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/add_coordinator');
		}
		$data['portal'] = $this->session->userdata('portal');
		$data['success'] = $success;
		$this->load->model('lme_model');
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/add_coordinator');
		$this->load->view('templates/footer');
	}
	
	public function add_county($success = null) {
		$data['title'] = 'Add County';
		$data['active'] = 'add_county';
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		$data['success'] = $success;

		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/add_county');
		}
		$data['portal'] = $this->session->userdata('portal');
		$this->load->model('lme_model');
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$data['wards'] = $this->lme_model->get_all_wards();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/add_county');
		$this->load->view('templates/footer');
	}

	public function add_cluster($success = null) {
		$data['title'] = 'Add Cluster';
		$data['active'] = 'add_cluster';
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('lme_model');
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		$data['success'] = $success;
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/add_cluster');
		}
		$data['portal'] = $this->session->userdata('portal');
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/add_cluster');
		$this->load->view('templates/footer');
	}

	public function add_product($success = null) {
		$data['title'] = 'Add Product';
		$data['active'] = 'add_product';
		$data['success'] = $success;
		$this->load->model('lme_model');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/add_product');
		}
		$data['portal'] = $this->session->userdata('portal');
		$data['categories'] = $this->lme_model->get_all_product_categories();
		$data['certification_status'] = $this->lme_model->get_all_certification_status();
		$data['certifications'] = $this->lme_model->get_all_certifications();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/add_product');
		$this->load->view('templates/footer');
	}

	public function add_sales() {
		$this->load->model('lme_model');
		$this->load->model('books_model');
		$data['title'] = 'Add Sales';
		$data['active'] = 'add_sales';
		$this->load->library('session');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/add_sales');
		}
		$data['portal'] = $this->session->userdata('portal');
		$data['books'] = $this->books_model->get_all_books();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['products'] = $this->lme_model->get_all_products();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$data['lmes'] = $this->lme_model->get_all_lmes();

		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/add_sales', $data);
		$this->load->view('templates/footer');
	}

	public function add_sales_api() {
		$this->load->model('sales_model');
		$this->sales_model->add_sale();
	}

	public function add_distributions_api() {
		$this->load->model('distributions_model');
		$this->distributions_model->add_distribution();
	}

	public function delete_distributions_api() {
		$this->load->model('distributions_model');
		$this->distributions_model->delete_distribution();
	}

	public function edit_sales_api() {
		$this->load->model('sales_model');
		$this->sales_model->edit_sale();
	}

	public function delete_sales_api() {
		$this->load->model('sales_model');
		$this->sales_model->delete_sale();
	}
}
?>