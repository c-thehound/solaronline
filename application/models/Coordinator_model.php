<?php
class Coordinator_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_all_coordinators() {
		$this->db->select('*');
		$this->db->from('coordinators');
		$user = $this->session->userdata('user');
		if ((int)$user->user_level !== 1) {
			$this->db->where('County', $user->County);
		}
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_coordinator($id) {
		$this->db->select('*');
		$this->db->from('coordinators');
		$this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
	}

	public function update_coordinator($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->update('coordinators', $data);
		redirect('coordinator/edit/' . $id . '/1', 'refresh');
	}

	public function delete_coordinator($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->delete('coordinators');
		redirect('view_coordinator/1', 'refresh');
	}

	public function add_coordinator() {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->insert('coordinators', $data);
		redirect('add_coordinator/1', 'refresh');
	}
}
?>
