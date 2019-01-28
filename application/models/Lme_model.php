<?php
class LME_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function isAdmin() {
		$user = $this->session->userdata('user');
		return (int)$user->user_level === 1;
	}

	public function get_all_counties() {
		$this->db->select('id, County, SubCounty, Cluster, Ward');
		$this->db->from('counties');
		$this->db->group_by('County');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_county($id) {
		$this->db->select('id, County, SubCounty, Cluster, Ward');
		$this->db->from('counties');
		$this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
	}

	public function get_all_clusters() {
		$this->db->select('id, County, SubCounty, Cluster, Ward');
		$this->db->from('counties');
		$this->db->group_by('Cluster');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_all_products() {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->group_by('ProductName');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_all_subcounties() {
		$this->db->select('id, County, SubCounty, Cluster, Ward');
		$this->db->from('counties');
		$this->db->group_by('SubCounty');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_all_categories() {
		$this->db->select('id, value as category_name');
		$this->db->from('lme_category');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_all_product_categories() {
		$this->db->select('id, ProductCategory');
		$this->db->from('product_categories');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_all_wards() {
		$this->db->select('id, Ward, County, SubCounty, Cluster');
		$this->db->from('counties');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_all_lmes() {
		$this->db->select('*');
		$this->db->from('lmes');
		$user = $this->session->userdata('user');
		if (!$this->isAdmin()) {
			$this->db->where('lmes.County', $user->County);
		}
        $query = $this->db->get();
        return $query->result_array();
	}


	public function get_all_coordinators() {
		$this->db->select('*');
		$this->db->from('coordinators');
		$user = $this->session->userdata('user');
		if (!$this->isAdmin()) {
			$this->db->where('lmes.County', $user->County);
		}
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_all_certification_status() {
		$this->db->select('*');
		$this->db->from('certification_status');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_all_certifications() {
		$this->db->select('*');
		$this->db->from('certifications');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_lme($id) {
		$this->db->select('*');
		$this->db->from('lmes');
		$this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
	}

	public function get_cluster($id) {
		$this->db->select('id, County, SubCounty, Cluster');
		$this->db->from('counties');
		$this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
	}

	public function get_total($table) {
		return $this->db->count_all($table);
	}

	public function update_lme($id) {
		$data = $this->input->post();
		if (isset($data['coordinator'])) {
			$coordinator = $data['coordinator'];
			$details = explode(',', $coordinator);
			$data['Coordinator_FirstName'] = $details[0];
			$data['Coordinator_LastName'] = $details[1];
			unset($data['coordinator']);
		}
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->update('lmes', $data);
		redirect('lme/edit/' . $id . '/1', 'refresh');
	}

	public function update_county($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->update('counties', $data);
		redirect('county/edit/' . $id . '/1', 'refresh');
	}

	public function update_cluster($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->update('counties', $data);
		redirect('cluster/edit/' . $id . '/1', 'refresh');
	}

	public function delete_cluster($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->delete('counties');
		redirect('view_cluster/1', 'refresh');
	}

	public function delete_county($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->delete('counties');
		redirect('view_county/1', 'refresh');
	}

	public function delete_lme($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->delete('lmes');
		redirect('lme/1', 'refresh');
	}

	public function add_lme() {
		$data = $this->input->post();
		if (isset($data['coordinator'])) {
			$coordinator = $data['coordinator'];
			$details = explode(',', $coordinator);
			$data['Coordinator_FirstName'] = $details[0];
			$data['Coordinator_LastName'] = $details[1];
			unset($data['coordinator']);
		}
		$this->load->helper('url');
		$this->db->insert('lmes', $data);
		redirect('add_lme/1', 'refresh');
	}

	public function add_county() {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->insert('counties', $data);
		redirect('add_county/1', 'refresh');
	}

	public function add_cluster() {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->insert('counties', $data);
		redirect('add_cluster/1', 'refresh');
	}
}
?>
