<?php
class Distributions_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_all_distributions() {
		$this->db->select('*');
		$this->db->from('product_distribution');
		$user = $this->session->userdata('user');
		if ((int)$user->user_level !== 1) {
			$this->db->where('County', $user->County);
		}
		$this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_latest_distribution($how_many = 1) {
		$this->db->select("*");
		$this->db->from("product_distribution");
		$this->db->order_by("id", "desc");
		$this->db->limit($how_many);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete_distribution() {
		if(isset($_POST['id'])) {
			$this->db->where('id', $_POST['id']);
			$this->db->delete('product_distribution');
			echo json_encode(array(
				'success' => true
				));
		} else {
			echo 'FORBIDDEN: MAKE THIS A 403';
		}
	}
	/*
	* This is just the same functionality as delete_distribution above only diffrence being that
	* the function above is api friendly and called by Ajax
	* this delete can be executed via the url
	*/
	public function drop_distribution($id) {
		$this->load->helper('url');
		$this->db->where('id', $id);
		$this->db->delete('product_distribution');
		redirect('product_distribution/1', 'refresh');
	}

	public function add_distribution() {
		if(isset($_POST['LME'])) {
			$data = array();
			$distributions_data = json_decode($_POST['distributions_data']);
			foreach($distributions_data as $distribution) {
				$lme_details = explode(",", $_POST['LME']);
				$data[] = array(
					'Period' => $_POST['Period'],
					'Cluster' => $_POST['Cluster'],
					'County' => $_POST['County'],
					'LME_FirstName' => $lme_details[0],
					'LME_LastName' => $lme_details[1],
					'Coordinator_FirstName' => $_POST['Coordinator_FirstName'],
					'Coordinator_LastName' => $_POST['Coordinator_LastName'],
					'Quantity' => $distribution->quantity,
					'CustomerCounty' => $distribution->county,
					'CustomerSubCounty' => $distribution->sub_county
				);
			}

			$this->db->insert_batch('product_distribution', $data);
			$sale = $this->get_latest_distribution(count($distributions_data));
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
