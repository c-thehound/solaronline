<?php
class Logs extends CI_Controller {

        public function __construct() {
                parent::__construct();
        }

        public function index() {
            $data['title'] = 'Logs';
            $this->load->library('session');
            $this->load->model('logs_model');
            $this->load->helper('url');
            $data['user'] = $this->session->userdata('user');
            // don't allow non-login users
            if(!isset($data['user'])) {
                redirect('/user?return_to=/logs');
            }
            $data['portal'] = $this->session->userdata('portal');
            $data['is_admin'] = (int)$data['user']->user_level === 1;
            $data['logs'] = $this->logs_model->get_logs();
            $this->load->helper('html');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/logs', $data);
            $this->load->view('templates/footer');
        }
}