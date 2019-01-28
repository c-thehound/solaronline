<?php
class View extends CI_Controller {
	public function __contstruct() {
		parent::__contstruct();
	}

	public function lme($success = null) {
		$this->load->model('lme_model');
		$data['title'] = 'View LMEs';
		$data['active'] = 'view_lmes';
		$data['success'] = $success;
		$this->load->library('session');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/lme');
		}
		// $this->load->library('pagination');

		// $config['base_url'] = base_url() . '/lme/page/';
		// $config['num_links'] = 9;
		// $config['query_string_segment'] = 'page';
		// $config['full_tag_open'] = '<div><ul class="pagination">';
		// $config['full_tag_close'] = '</ul></div><!--pagination-->';
		// $config['first_link'] = '&laquo; First';
		// $config['first_tag_open'] = '<li class="prev page">';
		// $config['first_tag_close'] = '</li>';
		// $config['last_link'] = 'Last &raquo;';
		// $config['last_tag_open'] = '<li class="next page">';
		// $config['last_tag_close'] = '</li>';
		// $config['next_link'] = 'Next &rarr;';
		// $config['next_tag_open'] = '<li class="next page">';
		// $config['next_tag_close'] = '</li>';
		// $config['prev_link'] = '&larr; Previous';
		// $config['prev_tag_open'] = '<li class="prev page">';
		// $config['prev_tag_close'] = '</li>';
		// $config['cur_tag_open'] = '<li class="active"><a href="">';
		// $config['cur_tag_close'] = '</a></li>';
		// $config['num_tag_open'] = '<li class="page">';
		// $config['num_tag_close'] = '</li>';
		// $config['display_pages'] = FALSE;
		// 
		// $config['anchor_class'] = 'follow_link';
		// $config['total_rows'] = $this->lme_model->get_total('lmes');
		// $config['per_page'] = 20;
		// $this->pagination->initialize($config);
		// $data['links'] = $this->pagination->create_links();

		$data['lmes'] = $this->lme_model->get_all_lmes();
		$data['portal'] = $this->session->userdata('portal');
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/view_lme', $data);
		$this->load->view('templates/footer');
	}

	function edit ($id, $success = null) {
		$this->load->model('lme_model');
		$this->load->helper('form');
		$data['title'] = 'Edit LME';
		$data['success'] = $success;
		$data['lme_id'] = $id;
		$this->load->library('session');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/lme/edit/' . $id);
		}
		$data['portal'] = $this->session->userdata('portal');
		$data['lme'] = $this->lme_model->get_lme($id);
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$data['categories'] = $this->lme_model->get_all_categories();
		$data['coordinators'] = $this->lme_model->get_all_coordinators();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/edit_lme', $data);
		$this->load->view('templates/footer');
	}

	function edit_product ($id, $success = null) {
		$data['title'] = 'Edit Product';
		$data['active'] = 'edit_product';
		$data['product_id'] = $id;
		$data['success'] = $success;
		$this->load->library('session');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/product/edit/' . $id);
		}
		$this->load->model('lme_model');
		$this->load->model('product_model');
		$this->load->helper('form');
		$data['portal'] = $this->session->userdata('portal');
		$data['product'] = $this->product_model->get_product($id);
		$data['categories'] = $this->lme_model->get_all_product_categories();
		$data['certification_status'] = $this->lme_model->get_all_certification_status();
		$data['certifications'] = $this->lme_model->get_all_certifications();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/edit_product', $data);
		$this->load->view('templates/footer');
	}

	function edit_county ($id, $success = null) {
		$data['title'] = 'Edit County';
		$data['active'] = 'edit_county';
		$data['county_id'] = $id;
		$data['success'] = $success;
		$this->load->library('session');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/county/edit/' . $id);
		}
		$this->load->model('lme_model');
		$this->load->helper('form');
		$data['portal'] = $this->session->userdata('portal');
		$data['county'] = $this->lme_model->get_county($id);
		$data['wards'] = $this->lme_model->get_all_wards();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/edit_county', $data);
		$this->load->view('templates/footer');
	}

	function edit_cluster ($id, $success = null) {
		$data['title'] = 'Edit Cluster';
		$data['active'] = 'edit_cluster';
		$data['cluster_id'] = $id;
		$data['success'] = $success;
		$this->load->library('session');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/cluster/edit/' . $id);
		}
		$this->load->model('lme_model');
		$this->load->helper('form');
		$data['portal'] = $this->session->userdata('portal');
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$data['cluster'] = $this->lme_model->get_cluster($id);
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/edit_cluster', $data);
		$this->load->view('templates/footer');
	}


	function edit_coordinator ($id, $success = null) {
		$this->load->model('coordinator_model');
		$this->load->model('lme_model');
		$this->load->helper('form');
		$data['title'] = 'Edit Coordinator';
		$data['success'] = $success;
		$data['coordinator_id'] = $id;
		$this->load->library('session');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/coordinator/edit/' . $id);
		}
		$data['portal'] = $this->session->userdata('portal');
		$data['coordinator'] = $this->coordinator_model->get_coordinator($id);
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/edit_coordinator', $data);
		$this->load->view('templates/footer');
	}

	function update_lme ($id) {
		$this->load->model('lme_model');
		$this->lme_model->update_lme($id);
	}

	function update_county ($id) {
		$this->load->model('lme_model');
		$this->lme_model->update_county($id);
	}

	function update_cluster ($id) {
		$this->load->model('lme_model');
		$this->lme_model->update_cluster($id);
	}

	function add_lme () {
		$this->load->model('lme_model');
		$this->lme_model->add_lme();
	}

	function add_product () {
		$this->load->model('product_model');
		$this->product_model->add_product();
	}

	function add_county () {
		$this->load->model('lme_model');
		$this->lme_model->add_county();
	}

	function add_cluster () {
		$this->load->model('lme_model');
		$this->lme_model->add_cluster();
	}

	function update_product ($id) {
		$this->load->model('product_model');
		$this->product_model->update_product($id);
	}

	function delete_product ($id) {
		$this->load->model('product_model');
		$this->product_model->delete_product($id);
	}

	function delete_lme ($id) {
		$this->load->model('lme_model');
		$this->lme_model->delete_lme($id);
	}

	function delete_county ($id) {
		$this->load->model('lme_model');
		$this->lme_model->delete_county($id);
	}

	function delete_cluster ($id) {
		$this->load->model('lme_model');
		$this->lme_model->delete_cluster($id);
	}

	function view_coordinator ($success = null) {
		$this->load->model('coordinator_model');
		$data['title'] = 'View Coordinator';
		$data['success'] = $success;
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		$this->load->helper('url');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/view_coordinator');
		}
		$data['portal'] = $this->session->userdata('portal');
		$data['coordinators'] = $this->coordinator_model->get_all_coordinators();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/view_coordinator', $data);
		$this->load->view('templates/footer');
	}

	public function view_cluster($success = null) {
		$data['title'] = 'View Cluster';
		$data['active'] = 'view_cluster';
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('lme_model');
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['user'] = $this->session->userdata('user');
		$data['success'] = $success;
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/view_cluster');
		}
		$data['portal'] = $this->session->userdata('portal');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/view_cluster', $data);
		$this->load->view('templates/footer');
	}

	function view_distribution ($success = null) {
		$this->load->model('distributions_model');
		$data['title'] = 'Product Distribution';
		$data['success'] = $success;
		$this->load->library('session');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/product_distribution');
		}
		$data['portal'] = $this->session->userdata('portal');
		$data['distributions'] = $this->distributions_model->get_all_distributions();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/view_distribution', $data);
		$this->load->view('templates/footer');
	}

	public function view_county($success = null) {
		$data['title'] = 'View County';
		$data['active'] = 'view_county';
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('lme_model');
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['user'] = $this->session->userdata('user');
		$data['success'] = $success;
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/view_county');
		}
		$data['portal'] = $this->session->userdata('portal');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/view_county', $data);
		$this->load->view('templates/footer');
	}

	function delete_distribution ($id) {
		$this->load->model('distributions_model');
		$this->distributions_model->drop_distribution($id);
	}

	function update_coordinator ($id) {
		$this->load->model('coordinator_model');
		$this->coordinator_model->update_coordinator($id);
	}

	function delete_coordinator ($id) {
		$this->load->model('coordinator_model');
		$this->coordinator_model->delete_coordinator($id);
	}

	function add_coordinator () {
		$this->load->model('coordinator_model');
		$this->coordinator_model->add_coordinator();
	}

	function view_sales ($success = null) {
		$this->load->model('sales_model');
		$data['title'] = 'View Sales';
		$data['success'] = $success;
		$this->load->library('session');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/sales');
		}
		$data['sales'] = $this->sales_model->get_all_sales();
		$data['portal'] = $this->session->userdata('portal');
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/view_sales', $data);
		$this->load->view('templates/footer');
	}

	function view_products ($success = null) {
		$this->load->model('product_model');
		$data['title'] = 'View Products';
		$data['success'] = $success;
		$this->load->helper('url');
		$data['products'] = $this->product_model->get_all_products();
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/view_product');
		}
		$data['portal'] = $this->session->userdata('portal');
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/view_products', $data);
		$this->load->view('templates/footer');
	}

}
?>