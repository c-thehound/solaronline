<?php
class Dashboard extends CI_Controller {
	public function __contstruct() {
		parent::__contstruct();
	}

	public function index() {
		$data['title'] = 'Dashboard';
		$this->load->library('session');
		$this->load->model('dashboard_model');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		$data['portal'] = $this->session->userdata('portal');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/dashboard');
		}
		$data['is_admin'] = (int)$data['user']->user_level === 1;
		$data['statistics'] = $this->dashboard_model->get_record_statistics();
		$data['county_sales'] = $this->dashboard_model->get_sales_by_county();
		$data['product_sales'] = $this->dashboard_model->get_sales_by_product();
		$data['stove_sales'] = $this->dashboard_model->get_sales_by_stove_type();
		$data['county_sales_map'] = $this->dashboard_model->get_sales_by_county('ammap');
		$data['stove_sales_map'] = $this->dashboard_model->get_stoves_built_by_county();
		$data['top_products'] = $this->dashboard_model->get_top_products();
		$data['top_lmes'] = $this->dashboard_model->get_top_lmes();
		$data['total_sales'] = $this->dashboard_model->get_total_sales();
		$data['top_builders'] = $this->dashboard_model->get_top_builders();
		$data['top_producers'] = $this->dashboard_model->get_top_producers();
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function reports() {
		$data['title'] = 'Reports';
		$this->load->library('session');
		$this->load->model('dashboard_model');
		$this->load->model('reports_model');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		$start = null;
		$end = null;
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/dashboard');
		}
		if (isset($_POST['startDate'])) {
			$start = $_POST['startDate'];
		}
		if (isset($_POST['endDate'])) {
			$end = $_POST['endDate'];
		}
		$data['is_admin'] = (int)$data['user']->user_level === 1;
		$data['portal'] = $this->session->userdata('portal');
		$data['sales_report'] = $this->reports_model->sales_per_county_report($start, $end);
		$data['lme_report'] = $this->reports_model->get_sales_per_lme_report($start, $end);
		$data['stoves_report'] = $this->reports_model->get_stove_quantities_per_county($start, $end);
		$data['stove_builder_report'] = $this->reports_model->get_builder_sales_per_stove($start, $end);
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/reports', $data);
		$this->load->view('templates/footer');
	}

	public function show_map() {
		$data['title'] = 'Maps';
		$this->load->library('session');
		$this->load->model('dashboard_model');
		$this->load->model('reports_model');
		$this->load->helper('url');
		$data['user'] = $this->session->userdata('user');
		// don't allow non-login users
		if(!isset($data['user'])) {
			redirect('/user?return_to=/dashboard');
		}
		$data['portal'] = $this->session->userdata('portal');
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/map', $data);
		$this->load->view('templates/footer');
	}
}
?>
