<?php
class Product_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function add_product() {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->insert('products', $data);
		redirect('add_product/1', 'refresh');
	}

	public function get_all_products() {
		$this->db->select('*');
		$this->db->from('products');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_product($id) {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
	}

	public function update_product($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->update('products', $data);
		redirect('product/edit/' . $id . '/1', 'refresh');
	}

	public function delete_product($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->delete('products');
		redirect('view_product/1', 'refresh');
	}

}
?>
