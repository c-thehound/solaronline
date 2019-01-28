<?php
class Reports_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	/**
	* Sales per county report
	* Generates a report on each products sales per county
	*/
	public function sales_per_county_report($start = null, $end = null) {
		$user = $this->session->userdata('user');
		$this->db->select('id, County, ProductName, Quantity');
		$this->db->from('sales');
		if ((int)$user->user_level !== 1) {
			$this->db->where('County', $user->County);
		}
		if ($start) {
			$this->db->where('Period >=', $start);
		}
		if ($end) {
			$this->db->where('Period <=', $end);
		}
		$query = $this->db->get();
        $sales = $query->result_array();
        $group = array();
        $group['counties'] = array();
        $group['sales'] = array();
        foreach ($sales as $sale) {
        	if (!isset($group['sales'][$sale['ProductName']])) {
        		// all products of the same name
        		$all_elements = array_filter($sales, function ($el) use($sale) {
        			return $el['ProductName'] === $sale['ProductName'];
        		});
        		// now group this by county
        		$county_sales = array();
        		foreach ($all_elements as $key => $value) {
        			if(isset($county_sales[$value['County']])) {
        				$county_sales[$value['County']] += (int)$value['Quantity'];
        			} else {
        				$county_sales[$value['County']] = (int)$value['Quantity'];
        			}
        			// add all counties
	        		if(!in_array(trim($value['County']), $group['counties'])) {
	        			$group['counties'][] = trim($value['County']);
	        		}
        		}
        		// sales for this product
        		$group['sales'][$sale['ProductName']] = $county_sales;
        		
        	}
        }
        return $group;
	}
	/**
	*
	*/
	public function get_sales_per_lme_report($start = null, $end = null) {
		$user = $this->session->userdata('user');
		$this->db->select('*, lmes.SubCounty, Sum(sales.Quantity) as total');
		$this->db->from('sales');
		if ((int)$user->user_level !== 1) {
			$this->db->where('lmes.County', $user->County);
		}
		if ($start) {
			$this->db->where('Period >=', $start);
		}
		if ($end) {
			$this->db->where('Period <=', $end);
		}
		$this->db->join('lmes', 'lmes.LME_FirstName = sales.LME_FirstName AND lmes.LME_LastName = sales.LME_LastName');
		$this->db->group_by('sales.LME_LastName');
		$this->db->order_by('total', 'desc');
		$results = $this->db->get();
		return $results->result_array();
	}

	public function get_stove_quantities_per_county($start = null, $end = null) {
		$user = $this->session->userdata('user');
		$this->db->select('id, County, StoveType, Quantity');
		$this->db->from('stove_data');
		if ((int)$user->user_level !== 1) {
			$this->db->where('County', $user->County);
		}
		if ($start) {
			$this->db->where('Period >=', $start);
		}
		if ($end) {
			$this->db->where('Period <=', $end);
		}
		$query = $this->db->get();
        $sales = $query->result_array();
        $group = array();
        $group['counties'] = array();
        $group['sales'] = array();
        foreach ($sales as $sale) {
        	if (!isset($group['sales'][$sale['StoveType']])) {
        		// all products of the same name
        		$all_elements = array_filter($sales, function ($el) use($sale) {
        			return $el['StoveType'] === $sale['StoveType'];
        		});
        		// now group this by county
        		$county_sales = array();
        		foreach ($all_elements as $key => $value) {
        			if(isset($county_sales[$value['County']])) {
        				$county_sales[$value['County']] += (int)$value['Quantity'];
        			} else {
        				$county_sales[$value['County']] = (int)$value['Quantity'];
        			}
        			//
        			// add all counties
	        		if(!in_array(trim($value['County']), $group['counties'])) {
	        			$group['counties'][] = trim($value['County']);
	        		}
        		}
        		// sales for this product
        		$group['sales'][$sale['StoveType']] = $county_sales;
        		
        	}
        }
        return $group;
	}

	public function get_builder_sales_per_stove($start = null, $end = null) {
		$user = $this->session->userdata('user');
		$this->db->select('id, County, SubCounty, Ward, StoveBuilder, StoveType, Quantity');
		$this->db->from('stove_data');
		if ((int)$user->user_level !== 1) {
			$this->db->where('County', $user->County);
		}
		if ($start) {
			$this->db->where('Period >=', $start);
		}
		if ($end) {
			$this->db->where('Period <=', $end);
		}
		$query = $this->db->get();
        $sales = $query->result_array();
        $group = array();
        $group['stove_types'] = array();
        $group['sales'] = array();
        foreach ($sales as $sale) {
        	if (!isset($group['sales'][$sale['StoveBuilder']])) {
        		// all products of the same name
        		$all_elements = array_filter($sales, function ($el) use($sale) {
        			return $el['StoveBuilder'] === $sale['StoveBuilder'];
        		});
        		// now group this by county
        		$type_sales = array();
        		foreach ($all_elements as $key => $value) {
        			if(isset($type_sales[$value['StoveType']])) {
        				$type_sales[$value['StoveType']] += (int)$value['Quantity'];
        			} else {
        				$type_sales[$value['StoveType']] = (int)$value['Quantity'];
        			}
        			//
        			// add all counties
	        		if(!in_array(trim($value['StoveType']), $group['stove_types'])) {
	        			$group['stove_types'][] = trim($value['StoveType']);
	        		}
        		}
        		// sales for this product
        		$group['sales'][$sale['StoveBuilder']] = $type_sales;
        		
        	}
        }
        return $group;
	}
}
?>
