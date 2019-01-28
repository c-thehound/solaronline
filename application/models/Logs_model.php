<?php
class Logs_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function time_elapsed_string($datetime, $full = false) {
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' ago' : 'just now';
	}

	public function table_logs($table) {
		$this->db->select($table . '.updated_on,' . ' user_login.user_id, user_login.username as username');
		$this->db->from($table);
		$this->db->where($table . '.added_by >', '0');
		$this->db->join('user_login', 'user_login.user_id = ' . $table . '.added_by');
		$this->db->order_by($table . '.id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function get_logs() {
		$data = array();
		$data['Coordinator'] = $this->table_logs('coordinators');
		$data['LME'] = $this->table_logs('lmes');
		$data['Cluster'] = $this->table_logs('clusters');
		$data['County'] = $this->table_logs('counties1');
		$data['Product'] = $this->table_logs('products');
		$data['Product Distribution'] = $this->table_logs('product_distribution');
		$data['Receipt Book'] = $this->table_logs('receipt_books');
		$data['Sales'] = $this->table_logs('sales');
		return $data;
	}
}
?>
