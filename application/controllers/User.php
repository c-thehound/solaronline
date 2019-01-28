<?php
class User extends CI_Controller {
	public function __contstruct() {
		parent::__construct();
	}

	public function index($success = null) {
		$data['title'] = 'Login';
		$data['page'] = 'login-page';
		$data['success'] = $success;
		$this->load->helper('url');
		$this->load->library('session');
		$user = $this->session->userdata('user');
		if(isset($user)) {
			redirect('/dashboard');
		}
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->view('templates/header', $data);
		$this->load->view('pages/login', $data);
		$this->load->view('templates/footer');
	}

	public function register($success = null) {
		$data['title'] = 'Register';
		$data['page'] = 'signup-page';
		$data['success'] = $success;
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('lme_model');
		$this->load->library('session');
		$user = $this->session->userdata('user');
		if(isset($user)) {
			redirect('/dashboard');
		}
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/signup', $data);
		$this->load->view('templates/footer');
	}

	public function recover_password($success = null) {
		$data['title'] = 'Recover Password';
		$data['page'] = 'login-page';
		$data['success'] = $success;
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$user = $this->session->userdata('user');
		if(isset($user)) {
			redirect('/dashboard');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('pages/recover_password', $data);
		$this->load->view('templates/footer');
	}

	public function new_password($hash, $success = null) {
		$data['title'] = 'Recover Password';
		$data['page'] = 'login-page';
		$data['hash'] = $hash;
		$data['success'] = $success;
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$user = $this->session->userdata('user');
		if(isset($user)) {
			redirect('/dashboard');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('pages/new_password', $data);
		$this->load->view('templates/footer');
	}

	public function send_recovery_email() {
		$this->load->model('user_model');
		$this->user_model->send_recovery_email();
	}

	public function change_password($hash) {
		$this->load->model('user_model');
		$this->user_model->change_password($hash);
	}

	public function add_user($success = null) {
		$data['title'] = 'Create User';
		$data['active'] = 'create_user';
		$data['success'] = $success;
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('lme_model');
		$this->load->library('session');
		$user = $this->session->userdata('user');
		if(!isset($user)) {
			redirect('user?return_to=/user/add');
		}
		$data['user'] = $user;
		$data['portal'] = $this->session->userdata('portal');
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/create_user', $data);
		$this->load->view('templates/footer');
	}

	public function edit_user($id, $success = null) {
		$data['title'] = 'Edit User';
		$data['active'] = 'view_users';
		$data['success'] = $success;
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('lme_model');
		$this->load->model('user_model');
		$this->load->library('session');
		$user = $this->session->userdata('user');
		if(!isset($user)) {
			redirect('user?return_to=/user/edit/' . $id);
		}
		$data['user'] = $user;
		$data['portal'] = $this->session->userdata('portal');
		$data['edit_user'] = $this->user_model->single_user($id);
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/edit_user', $data);
		$this->load->view('templates/footer');
	}

	public function view_users($success = null) {
		$data['title'] = 'View Users';
		$data['active'] = 'view_users';
		$data['success'] = $success;
		$data['levels'] = array('Data Entry', 'Admin', 'View Only');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->model('user_model');
		$this->load->library('session');
		$user = $this->session->userdata('user');
		if(!isset($user)) {
			redirect('user?return_to=/user/add');
		}
		$data['user'] = $user;
		$data['portal'] = $this->session->userdata('portal');
		$data['users'] = $this->user_model->get_users();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/view_users', $data);
		$this->load->view('templates/footer');
	}

	public function logout() {
		$this->load->helper('url');
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect('/user');
	}

	public function profile($id, $success=null) {
		$data['title'] = 'Profile';
		$data['page'] = 'profile';
		$data['success'] = $success;
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('lme_model');
		$this->load->model('user_model');
		$data['user'] = $this->user_model->single_user($id);
		$data['portal'] = $this->session->userdata('portal');
		$data['counties'] = $this->lme_model->get_all_counties();
		$data['clusters'] = $this->lme_model->get_all_clusters();
		$data['sub_counties'] = $this->lme_model->get_all_subcounties();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/profile', $data);
		$this->load->view('templates/footer');
	}

	public function check_login() {
		$this->load->model('user_model');
		$this->load->library('session');
		$this->load->helper('url');
		$user = $this->user_model->get_user();
		if ($user) {
			$this->session->set_userdata(array(
				'user' => $user,
				'portal' => $_POST['portal'],
			));

			if(!empty($this->input->post('return_to'))) {
				redirect($this->input->post('return_to'), 'refresh');
			}
			else redirect('dashboard', 'refresh');
		} else {
			redirect('/user/wrong_details', 'refresh');
		}
	}

	public function create_user() {
		$this->load->model('user_model');
		$this->load->library('session');
		$this->load->helper('url');
		$user = $this->user_model->get_user();
		if ($user) {
			// this user already exists
			redirect('user/register/user_exists', 'refresh');
		} else {
			$registered_user = $this->user_model->create_user();
			$this->session->set_userdata(array(
				'user' => $registered_user)
			);
			redirect('dashboard', 'refresh');
		}
	}

	public function update($id) {
		$this->load->model('user_model');
		$this->user_model->update($id);
	}

	public function delete($id) {
		$this->load->model('user_model');
		$this->user_model->delete($id);
	}

	public function notify_user($email, $details) {
		$this->load->library('email');
		$this->load->helper('url');
		$subject = 'Solar Online - New account created';
		$message = '<p>Dear ' . $details['user_firstname'] . ',</p>';
		$message .= '<p>An account has been created for you to log in to solar-online system.</p>';
		$message .= '<p>Use the following details to log in: </p><br>';
		$message .= '<p>Username: ' . $details['username'] . '</p>';
		$message .= '<p>Pass-word: ' . $details['password'] . '</p>';
		$message .= '<p>Click/Copy the link below and paste to your browser window to log in</p>';
		$message .= '<p>' . base_url() . 'user</p>';

		// Get full html:
		$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		    <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
		    <title>' . html_escape($subject) . '</title>
		    <style type="text/css">
		        body {
		            font-family: Arial, Verdana, Helvetica, sans-serif;
		            font-size: 16px;
		        }
		    </style>
		</head>
		<body>
		' . $message . '
		</body>
		</html>';
		// Also, for getting full html you may use the following internal method:
		$body = $this->email->full_html($subject, $message);

		$result = $this->email
	        ->from('endevenergy@gmail.com')
	        // ->reply_to('yoursecondemail@somedomain.com')    // Optional, an account where a human being reads.
	        ->to($email)
	        ->subject($subject)
	        ->message($body)
	        ->send();
		return $result;
	}

	public function create_user_admin() {
		$this->load->model('user_model');
		$this->load->library('session');
		$this->load->helper('url');
		$user = $this->user_model->get_user();
		if ($user) {
			// this user already exists
			redirect('user/add/user_exists', 'refresh');
		} else {
			$registered_user = $this->user_model->create_user();
			if ($registered_user) {
				// send email notification
				$this->notify_user('masikapolycarp@gmail.com', $this->input->post());
			}
			redirect('user/add/1', 'refresh');
		}
	}
}
?>