<?php
class User_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function delete($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('user_id', $id);
		$this->db->delete('user_login');
		redirect('user/all/1', 'refresh');
	}

	public function update($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('user_id', $id);
		$this->db->update('user_login', $data);
		redirect('user/edit/' . $id . '/1', 'refresh');
	}

	public function get_user() {
		$data = $this->input->post();
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where('username', $data['username']);
		$this->db->where('password', md5($data['password']));
        $query = $this->db->get();
        return $query->row();
	}

	public function get_users() {
		$this->db->select('*');
		$this->db->from('user_login');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function create_user() {
		$data = $this->input->post();
		$data['password'] = md5($data['password']);
		$this->load->helper('url');
		$this->db->insert('user_login', $data);
		//
		$id = $this->db->insert_id();
		return $this->single_user($id);
	}

	public function single_user($val, $key = 'user_id') {
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($key, $val);
		$this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
	}

	public function notify_user($email, $details) {
		$this->load->library('email');
		$this->load->helper('url');
		$subject = 'Solar Online - Account Recovery';
		$message = '<p>Dear ' . $details->user_firstname . ',</p>';
		$message .= '<p>Click/Copy the link below and paste to your browser window to recover your pass-word</p>';
		$message .= '<p>' . base_url('/user/new_password/' . $details->hash) . '</p>';

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
	        ->from('endevenergy@gmail.com', 'Solar Online')
	        // ->reply_to('yoursecondemail@somedomain.com')    // Optional, an account where a human being reads.
	        ->to($email)
	        ->subject($subject)
	        ->message($body)
	        ->send();

		return $result;
	}

	public function send_recovery_email() {
		$data = $this->input->post();
		$user = $this->single_user($data['email'], 'user_email');
		if ($user) {
			// update the recovery hash
			$hash = bin2hex(random_bytes(16));
			$this->db->where('user_id', $user->user_id);
			$q = $this->db->update('user_login', array(
				'recovery_hash' => $hash)
			);
			if ($q) {
				$user->hash = $hash;
				$email = $this->notify_user($data['email'], $user);
				if ($email) {
					redirect('/user/password_recovery/1', 'refresh');
				} else {
					redirect('/user/password_recovery/3', 'refresh');
				}
			}
		} else {
			$this->load->helper('url');
			redirect('/user/password_recovery/2', 'refresh');
		}
	}

	public function change_password($hash) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('recovery_hash', $hash);
		$this->db->update('user_login', array(
			'password' => md5($data['password']),
			'recovery_hash' => ''
		));
		redirect('user/new_password/' . $hash . '/1', 'refresh');
	}
}
?>
