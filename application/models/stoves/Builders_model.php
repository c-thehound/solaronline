<?php
class Builders_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_all_builders() {
		$this->db->select('*');
		$this->db->from('stove_builders');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_builder($id) {
		$this->db->select('*');
		$this->db->from('stove_builders');
		$this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
	}

	public function get_all_centres() {
		$this->db->select('*');
		$this->db->from('stove_producers');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_centre($val, $key = 'id') {
		$this->db->select('*');
		$this->db->from('stove_producers');
		$this->db->where($key, $val);
        $query = $this->db->get();
        return $query->row();
	}

	public function get_all_stove_data() {
		$this->db->select('*');
		$this->db->from('stove_data');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_all_producer_data() {
		$this->db->select('*');
		$this->db->from('stove_producers_data');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_all_monitors() {
		$this->db->select('id, County, SubCounty, Cluster, StoveBuilder, SGroup, Ward');
		$this->db->from('stove_builders');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_all_groups() {
		$this->db->select('*');
		$this->db->from('stove_groups');
		$this->db->group_by('SGroup');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function post_builder() {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->insert('stove_builders', $data);
		redirect('stoves/add_builder/1', 'refresh');
	}

	public function post_centre() {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->insert('stove_producers', $data);
		redirect('stoves/add_centre/1', 'refresh');
	}

	public function update_centre($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->update('stove_producers', $data);
		redirect('stoves/producers/edit/' . $id . '/1', 'refresh');
	}

	public function update_builder($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->update('stove_builders', $data);
		redirect('stove/builders/edit/' . $id . '/1', 'refresh');
	}

	public function delete_builder($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->delete('stove_builders');
		redirect('stoves/view_builders/1', 'refresh');
	}

	public function delete_stove_data_url($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->delete('stove_data');
		redirect('stoves/view_data/1', 'refresh');
	}

	public function delete_producer_data_url($id) {
		$data = $this->input->post();
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->delete('stove_producers_data');
		redirect('stoves/producers/view_data/1', 'refresh');
	}

	public function get_latest_sale($how_many = 1) {
		$this->db->select("*");
		$this->db->from("stove_data");
		$this->db->order_by("id", "desc");
		$this->db->limit($how_many);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_latest_producer_data($how_many = 1) {
		$this->db->select("*");
		$this->db->from("stove_producers_data");
		$this->db->order_by("id", "desc");
		$this->db->limit($how_many);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function add_stove_data() {
		$sales_data = json_decode($_POST['households']);
		$data = array();
		foreach($sales_data as $sale) {
			$data[] = array(
				'Period' => $_POST['Period'],
				'Cluster' => $_POST['Cluster'],
				'County' => $_POST['County'],
				'SubCounty' => $_POST['SubCounty'],
				'Ward' => $_POST['Ward'],
				'Monitor' => $_POST['Monitor'],
				'SGroup' => $_POST['SGroup'],
				'StoveBuilder' => $_POST['StoveBuilder'],
				'Quantity' => $sale->quantity,
				'StoveType' => $sale->stove_type,
				'Households' => $sale->households,
				'Quantity' => $sale->quantity,
				'added_by' => $_POST['added_by'],
			);
		}
		$this->db->insert_batch('stove_data', $data);
		$sale = $this->get_latest_sale(count($sales_data));
		echo json_encode($sale);
	}

	public function delete_stove_data() {
		if(isset($_POST['id'])) {
			$this->db->where('id', $_POST['id']);
			$this->db->delete('stove_data');
			echo json_encode(array(
				'success' => true
				));
		} else {
			echo 'FORBIDDEN: MAKE THIS A 403';
		}
	}

	public function add_producer_data() {
		$sales_data = json_decode($_POST['producers']);
		$data = array();
		foreach($sales_data as $sale) {
			$centre = $this->get_centre($_POST['GroupName'], 'GroupName');
			$data[] = array(
				'Period' => $_POST['Period'],
				'Cluster' => $_POST['Cluster'],
				'County' => $_POST['County'],
				'SubCounty' => $_POST['SubCounty'],
				'Ward' => $centre->Ward,
				'ProducerType' => $centre->ProducerType,
				'GroupName' => $_POST['GroupName'],
				'Members' => $centre->Members,
				'Male' => $centre->Male,
				'Female' => $centre->Female,
				'Kilns' => $centre->Kilns,
				'Mould' => $centre->Mould,
				'StoveType' => $sale->stove_type,
				'QtyGreen' => $sale->green,
				'QtyFired' => $sale->fired,
				'QtySold' => $sale->sold,
				'added_by' => $_POST['added_by'],
			);
		}
		$this->db->insert_batch('stove_producers_data', $data);
		$sale = $this->get_latest_producer_data(count($sales_data));
		echo json_encode($sale);
	}

	public function delete_producer_data() {
		if(isset($_POST['id'])) {
			$this->db->where('id', $_POST['id']);
			$this->db->delete('stove_producers_data');
			echo json_encode(array(
				'success' => true
				));
		} else {
			echo 'FORBIDDEN: MAKE THIS A 403';
		}
	}
}
?>
