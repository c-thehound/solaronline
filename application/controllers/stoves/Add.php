<?php
class Add extends CI_Controller {
	public function __contstruct() {
		parent::__contstruct();
	}

	public function add_builder($success = null) {
		$data['title'] = 'Add Builder';
		$data['success'] = $success;
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
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar');
		$this->load->view('pages/stoves/add_builder', $data);
		$this->load->view('templates/footer');
	}

	function post_builder () {
		$this->load->model('stoves/builders_model');
		$this->builders_model->post_builder();
	}

	public function add_centre($success = null) {
		$data['title'] = 'Add Centre';
		$data['success'] = $success;
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
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar');
		$this->load->view('pages/stoves/add_centre', $data);
		$this->load->view('templates/footer');
	}

	function post_centre () {
		$this->load->model('stoves/builders_model');
		$this->builders_model->post_centre();
	}

	function edit_centre ($id) {
		$this->load->model('stoves/builders_model');
		$this->builders_model->update_centre($id);
	}

	public function add_stove_data_api() {
		$this->load->model('stoves/builders_model');
		$this->builders_model->add_stove_data();
	}

	public function delete_stove_data_api() {
		$this->load->model('stoves/builders_model');
		$this->builders_model->delete_stove_data();
	}

	public function add_producer_data_api() {
		$this->load->model('stoves/builders_model');
		$this->builders_model->add_producer_data();
	}

	public function delete_producer_data_api() {
		$this->load->model('stoves/builders_model');
		$this->builders_model->delete_producer_data();
	}
}
?>