<?php
class View extends CI_Controller {
	public function __contstruct() {
		parent::__contstruct();
	}

	function view_builders ($success = null) {
		$this->load->model('stoves/builders_model');
		$data['title'] = 'View Builders';
		$data['success'] = $success;
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		$data['portal'] = $this->session->userdata('portal');
		$this->load->helper('url');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/stoves/view_builders');
		}

		$data['builders'] = $this->builders_model->get_all_builders();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/stoves/view_builders', $data);
		$this->load->view('templates/footer');
	}

	function edit_builder ($id, $success = null) {
		$this->load->model('stoves/builders_model');
		$data['title'] = 'Edit Builder';
		$data['success'] = $success;
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		$data['portal'] = $this->session->userdata('portal');
		$this->load->helper('url');
		$this->load->helper('form');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=' . current_url());
		}
		$this->load->model('lme_model');
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$data['wards'] = $this->lme_model->get_all_wards();
		$data['groups'] = $this->builders_model->get_all_groups();
		$data['monitors'] = $this->builders_model->get_all_monitors();
		$data['builder_id'] = $id;
		$data['builder'] = $this->builders_model->get_builder($id);
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/stoves/edit_builder', $data);
		$this->load->view('templates/footer');
	}

	public function edit_centre($id, $success = null) {
		$data['title'] = 'Edit Centre';
		$data['success'] = $success;
		$data['centre_id'] = $id;
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$data['user'] = $this->session->userdata('user');
		if(!isset($data['user'])) {
			redirect('/user?return_to=' . current_url());
		}
		$this->load->model('lme_model');
		$this->load->model('stoves/builders_model');
		$data['portal'] = $this->session->userdata('portal');
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$data['wards'] = $this->lme_model->get_all_wards();
		$data['groups'] = $this->builders_model->get_all_groups();
		$data['monitors'] = $this->builders_model->get_all_monitors();
		$data['centre'] = $this->builders_model->get_centre($id);
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar');
		$this->load->view('pages/stoves/edit_centre', $data);
		$this->load->view('templates/footer');
	}

	function view_centres ($success = null) {
		$this->load->model('stoves/builders_model');
		$data['title'] = 'View Centres';
		$data['success'] = $success;
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		$data['portal'] = $this->session->userdata('portal');
		$this->load->helper('url');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=' . current_url());
		}
		$data['centres'] = $this->builders_model->get_all_centres();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/stoves/view_centres', $data);
		$this->load->view('templates/footer');
	}

	function data_entry ($success = null) {
		$this->load->model('stoves/builders_model');
		$data['title'] = 'Stoves Data Entry';
		$data['success'] = $success;
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		$data['portal'] = $this->session->userdata('portal');
		$this->load->helper('url');
		$this->load->helper('form');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=' . current_url());
		}
		$this->load->model('lme_model');
		$this->load->model('books_model');
		$data['books'] = $this->books_model->get_all_books();
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$data['wards'] = $this->lme_model->get_all_wards();
		$data['groups'] = $this->builders_model->get_all_groups();
		$data['monitors'] = $this->builders_model->get_all_monitors();
		$data['builders'] = $this->builders_model->get_all_builders();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/stoves/stoves_data', $data);
		$this->load->view('templates/footer');
	}

	function producer_data_entry ($success = null) {
		$this->load->model('stoves/builders_model');
		$data['title'] = 'Production Centres';
		$data['success'] = $success;
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		$data['portal'] = $this->session->userdata('portal');
		$this->load->helper('url');
		$this->load->helper('form');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=' . current_url());
		}
		$this->load->model('lme_model');
		$this->load->model('books_model');
		$data['books'] = $this->books_model->get_all_books();
		$data['centres'] = $this->builders_model->get_all_centres();
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/stoves/producers_data', $data);
		$this->load->view('templates/footer');
	}

	function view_stove_data ($success = null) {
		$this->load->model('stoves/builders_model');
		$data['title'] = 'View Stove Data';
		$data['success'] = $success;
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		$data['portal'] = $this->session->userdata('portal');
		$this->load->helper('url');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=' . current_url());
		}
		$data['stove_data'] = $this->builders_model->get_all_stove_data();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/stoves/view_stove_data', $data);
		$this->load->view('templates/footer');
	}

	function view_producer_data ($success = null) {
		$this->load->model('stoves/builders_model');
		$data['title'] = 'View Producer Data';
		$data['success'] = $success;
		$this->load->library('session');
		$data['user'] = $this->session->userdata('user');
		$data['portal'] = $this->session->userdata('portal');
		$this->load->helper('url');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=' . current_url());
		}
		$data['producer_data'] = $this->builders_model->get_all_producer_data();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/stoves/view_producer_data', $data);
		$this->load->view('templates/footer');
	}

	function update_builder ($id) {
		$this->load->model('stoves/builders_model');
		$this->builders_model->update_builder($id);
	}

	function delete_builder ($id) {
		$this->load->model('stoves/builders_model');
		$this->builders_model->delete_builder($id);
	}

	function delete_stove_data_url($id) {
		$this->load->model('stoves/builders_model');
		$this->builders_model->delete_stove_data_url($id);
	}

	function delete_producer_data_url($id) {
		$this->load->model('stoves/builders_model');
		$this->builders_model->delete_producer_data_url($id);
	}
}
?>