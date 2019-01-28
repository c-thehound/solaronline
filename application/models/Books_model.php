<?php
class Books_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function add_book() {
		$this->load->library('session');
		$portal = $this->session->userdata('portal');
		$data = $this->input->post();
		if ($portal === 'stoves') {
			$this->load->helper('url');
			$this->db->insert('stoves_receipt_books', $data);
		} else {
			if (isset($data['lme'])) {
				$lme_details = explode(",", $data['lme']);
				$data['LME_FirstName'] = $lme_details[0];
				$data['LME_LastName'] = $lme_details[1];
				unset($data['lme']);
			}
			$this->load->helper('url');
			$this->db->insert('receipt_books', $data);
		}
		redirect('register_book/1', 'refresh');
	}

	public function get_all_books() {
		$this->load->library('session');
		$user = $this->session->userdata('user');
		$portal = $this->session->userdata('portal');
		$this->db->select("*");
		if ($portal === 'solar') {
			$this->db->from('receipt_books');
		} else {
			$this->db->from('stove_receipt_books');
		}

		if ((int)$user->user_level !== 1) {
			$this->db->where('County', $user->County);
		}

        $query = $this->db->get();
        return $query->result_array();
	}

	public function delete_book($id) {
		$this->load->library('session');
		$data = $this->input->post();
		$portal = $this->session->userdata('portal');
		$this->load->helper('url');
		$this->db->where('id', $id);
		if ($portal === 'solar') {
			$this->db->delete('receipt_books');
		} else {
			$this->db->delete('stove_receipt_books');
		}
		redirect('view_books/1', 'refresh');
	}
}
?>
