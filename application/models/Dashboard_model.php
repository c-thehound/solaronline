<?php
class Dashboard_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function isAdmin() {
		$user = $this->session->userdata('user');
		return (int)$user->user_level === 1;
	}

	function getRandomColor() {
    	return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
	}


	public function get_record_statistics() {
		$query = $this->db->query('show tables');
		$tables = $query->result_array();
		$stats = array();
		$this->load->model('dashboard_model');
		$user = $this->session->userdata('user');
		$tables_to_analyse = array(
			'lmes',
			'coordinators',
			'sales'
			);

		foreach($tables as $table) {
			$table_name = $table['Tables_in_' . $this->db->database];			
			$table_query = $this->db->select('count(*) as row_count');
			$this->db->from($table_name);
			if (!$this->isAdmin()) {
				// only user where clause where neccessary
				// this will filter out results where user is not in
				if (in_array($table_name, $tables_to_analyse)) {
					$this->db->where('County', $user->County);
				}
			}
			$this->db->distinct();
			$result = $this->db->get();
			$stat = $result->row();
			$stats[$table_name] = $stat->row_count;
			$this->db->reset_query();
		}

		return $stats;
	}

	public function get_sales_by_county($type = 'morris') {
		$user = $this->session->userdata('user');
		$this->db->select('sales.County, sales.Quantity, counties1.Code');
		if (!$this->isAdmin()) {
			$this->db->where('sales.County', $user->County);
		}
		$this->db->from('sales');
		$this->db->join('counties1', 'counties1.County = sales.County');
		$results = $this->db->get();
		$array = $results->result_array();
		$json_data = array();
		// for morris chart
		if ($type === 'morris') {
			$total_by_county = array();
			foreach($array as $result) {
				if (isset($total_by_county[$result['County']])) {
					$total_by_county[$result['County']] += (int)$result['Quantity'];
				} else {
					$total_by_county[$result['County']] = (int)$result['Quantity'];
				}
			}

			if (isset($total_by_county[''])) {
				// unknown records - for follow up
				$total_by_county['(Unknown)'] = $total_by_county[''];
				unset($total_by_county['']);
			}

			//convert to json 
			
			foreach($total_by_county as $key => $value) {
				$json_data[] = array(
					'label' => $key,
					'value' => (int) $value
				);
			}
		// Generate data specific for the Amcharts map
		} else if ($type === 'ammap') {
			$total_by_county = array();
			foreach($array as $result) {
				if (isset($total_by_county[$result['County']])) {
					$total_by_county[$result['County']]['Quantity'] += (int)$result['Quantity'];
				} else {
					$total_by_county[$result['County']] = array(
						'Quantity' => (int)$result['Quantity'],
						'Code' => $result['Code'],
						'County' => $result['County']
					);
				}
			}
			//
			foreach($total_by_county as $key => $value) {
				$json_data[] = array(
					'id' => $value['Code'],
					'value' => (int) $value['Quantity'],
					'balloonText' => '[[title]]: [[value]] products sold',
					'county' => $value['County'],
					'color' => $this->getRandomColor()
				);
			}
		}

		return $json_data;
	}

	public function get_stoves_built_by_county() {
		$user = $this->session->userdata('user');
		$this->db->select('stove_data.County, SUM(stove_data.Quantity) as total, counties1.Code as Code');
		if (!$this->isAdmin()) {
			$this->db->where('stove_data.County', $user->County);
		}
		$this->db->from('stove_data');
		$this->db->group_by('stove_data.County');
		$this->db->join('counties1', 'counties1.County = stove_data.County');
		$results = $this->db->get();
		$array = $results->result_array();
		$json_data = array();
		
		foreach($array as $key => $value) {
			$json_data[] = array(
				'id' => $value['Code'],
				'value' => (int) $value['total'],
				'balloonText' => '[[title]]: [[value]] products sold',
				'county' => $value['County'],
				'color' => $this->getRandomColor()
			);
		}

		return $json_data;
	}


	public function get_sales_by_product() {
		$this->db->select('sales.ProductName, SUM(sales.Quantity) as total, products.RRP');
		$this->db->from('sales');
		$this->db->join('products', 'sales.ProductName = products.ProductName');
		$user = $this->session->userdata('user');
		if (!$this->isAdmin()) {
			$this->db->where('sales.County', $user->County);
		}
		$this->db->group_by('sales.ProductName');
		$results = $this->db->get();
		$array = $results->result_array();

		$formatted = array();
		foreach ($array as $key => $value) {
			$formatted[] = array(
				'label' => $value['ProductName'],
				'value' => $value['total']
				);
		}
		// sort in descending order
		usort($formatted, function ($a, $b) {
			return $b['value'] - $a['value'];
		});
		return $formatted;
	}

	public function get_sales_by_stove_type() {
		$this->db->select('StoveType, SUM(Quantity) as total');
		$this->db->from('stove_data');
		$user = $this->session->userdata('user');
		if (!$this->isAdmin()) {
			$this->db->where('County', $user->County);
		}
		$this->db->group_by('StoveType');
		$results = $this->db->get();
		$array = $results->result_array();
		$formatted = array();
		foreach ($array as $key => $value) {
			$formatted[] = array(
				'label' => $value['StoveType'],
				'value' => $value['total']
				);
		}
		// sort in descending order
		usort($formatted, function ($a, $b) {
			return $b['value'] - $a['value'];
		});
		return $formatted;
	}

	public function get_total_sales() {
		$this->db->select('sales.ProductName, sales.Quantity, products.RRP');
		$this->db->from('sales');
		$this->db->join('products', 'sales.ProductName = products.ProductName');
		$user = $this->session->userdata('user');
		if (!$this->isAdmin()) {
			$this->db->where('sales.County', $user->County);
		}
		$results = $this->db->get();
		$array = $results->result_array();
		$total_by_county = array();
		foreach($array as $result) {
			if (isset($total_by_county[$result['ProductName']])) {
				$total_by_county[$result['ProductName']] += ($result['Quantity'] * $result['RRP']);
			} else {
				$total_by_county[$result['ProductName']] = (int)($result['Quantity'] * $result['RRP']);
			}
		}
		$total = 0;
		foreach ($total_by_county as $key => $value) {
			$total += $value;
		}
		return $total;
	}

	public function get_top_products() {
		$user = $this->session->userdata('user');
		$this->db->select('*, Sum(Quantity) as total');
		$this->db->from('sales');
		if (!$this->isAdmin()) {
			$this->db->where('County', $user->County);
		}
		$this->db->group_by('ProductName');
		$this->db->order_by('total', 'desc');
		$this->db->limit('10');
		$results = $this->db->get();
		return $results->result_array();
	}

	public function get_top_lmes() {
		$user = $this->session->userdata('user');
		$this->db->select('*, Sum(Quantity) as total');
		$this->db->from('sales');
		if (!$this->isAdmin()) {
			$this->db->where('County', $user->County);
		}
		$this->db->group_by('LME_LastName');
		$this->db->order_by('total', 'desc');
		$this->db->limit('10');
		$results = $this->db->get();
		return $results->result_array();
	}

	public function get_top_builders() {
		$user = $this->session->userdata('user');
		$this->db->select('*, Sum(Quantity) as total');
		$this->db->from('stove_data');
		if (!$this->isAdmin()) {
			$this->db->where('County', $user->County);
		}
		$this->db->group_by('StoveBuilder');
		$this->db->order_by('total', 'desc');
		$this->db->limit('10');
		$results = $this->db->get();
		return $results->result_array();
	}

	public function get_top_producers() {
		$user = $this->session->userdata('user');
		$this->db->select('*, Sum(QtySold) as total');
		$this->db->from('stove_producers_data');
		if (!$this->isAdmin()) {
			$this->db->where('County', $user->County);
		}
		$this->db->group_by('GroupName');
		$this->db->order_by('total', 'desc');
		$this->db->limit('10');
		$results = $this->db->get();
		return $results->result_array();
	}
}
?>
