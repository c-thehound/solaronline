<?php
class Sales_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_all_sales() {
		$this->db->select('*');
		$this->db->from('sales');
		$user = $this->session->userdata('user');
		if ((int)$user->user_level !== 1) {
			$this->db->where('County', $user->County);
		}
		$this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_latest_sale($how_many = 1) {
		$this->db->select("*");
		$this->db->from("sales");
		$this->db->order_by("id", "desc");
		$this->db->limit($how_many);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function add_sale() {
		if(isset($_POST['LME'])) {
			$data = array();
			$this->load->model('lme_model');
			//
			$sales_data = json_decode($_POST['sales_data']);
			foreach($sales_data as $sale) {
				$lme_details = explode(",", $_POST['LME']);
				$lme = $this->lme_model->get_lme($lme_details[2]);
				$data[] = array(
					'Period' => $_POST['Period'],
					'Cluster' => $_POST['Cluster'],
					'County' => $_POST['County'],
					'Quantity' => $sale->quantity,
					'ProductName' => $sale->product_name,
					'LME_FirstName' => $lme_details[0],
					'LME_LastName' => $lme_details[1],
					'Coordinator_FirstName' => $lme->Coordinator_FirstName,
					'Coordinator_LastName' => $lme->Coordinator_LastName,
				);
			}

			$this->db->insert_batch('sales', $data);
			$sale = $this->get_latest_sale(count($sales_data));
			echo json_encode($sale);

		} else {
			echo 'FORBIDDEN: MAKE THIS A 403';
		}
	}

	public function delete_sale() {
		if(isset($_POST['id'])) {
			$this->db->where('id', $_POST['id']);
			$this->db->delete('sales');
			echo json_encode(array(
				'success' => true
				));
		} else {
			echo 'FORBIDDEN: MAKE THIS A 403';
		}
	}

	public function edit_sale() {
		if(isset($_POST['id'])) {
			$data = $_POST;
			if (isset($data['lme'])) {
				$lme = explode(' ', $data['lme']);
				$data['LME_FirstName'] = $lme[0];
				$data['LME_LastName'] = $lme[1];
				unset($data['lme']);
			}
			if (isset($data['Coordinator'])) {
				$coordinator = explode(' ', $data['Coordinator']);
				$data['Coordinator_FirstName'] = $coordinator[0];
				$data['Coordinator_LastName'] = $coordinator[1];
				unset($data['Coordinator']);
			}
			$this->db->where('id', $_POST['id']);
			$this->db->update('sales', $data);
			echo json_encode(array(
				'success' => true
				));
		} else {
			echo 'FORBIDDEN: MAKE THIS A 403';
		}
	}
}
?>
