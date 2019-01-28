<?php
class Upload_model extends CI_Model {
	public function __construct() {
		parent::__construct();
            $this->load->library('excel');
	}
		/**
		* Convert the data from the upload file into database friendly inout the save
		*/
        public function save_data($table) {
			$data = json_decode($this->input->post()["data"]);
			// date columns should be converted to mysql DATE friendly fields
			// add date columns in here
			$date_columns = array(
				'Period'
			);
			$headers = $data->headers;
			$input = $data->data;
			$database_input = array();
			foreach ($input as $record) {
				$new_record = array();
				for($row = 0; $row < count($headers); $row++) {
					// sometimes arrays or objects may be thrown at the model so make sure
					// both cases are taken care of
					if (is_object($record) && isset($headers[$row])) {
						// for date columns only
						if (in_array($headers[$row], $date_columns)) {
							if(isset($record->{$row})) {
								$date = date_create($record->{$row});
								$formatted = date_format($date,"Y-m-d");
								$new_record[$headers[$row]] = $formatted;
							} else {
								$new_record[$headers[$row]] = "";
							}
						} else {
							// for other non-date columns
							$new_record[$headers[$row]] = isset($record->{$row}) ? $record->{$row} : "";
						}
					} else if(is_array($record) && isset($headers[$row])) {
						// for date columns only
						if (in_array($headers[$row], $date_columns)) {
							if (isset($record[$row])) {
								$date = date_create($record[$row]);
								$formatted = date_format($date,"Y-m-d");
								$new_record[$headers[$row]] = $formatted;
							} else {
								$new_record[$headers[$row]] = "";
							}
						} else {
							// for other non-date columns
							$new_record[$headers[$row]] = isset($record[$row]) ? $record[$row] : "";
						}
					}
				}
				$database_input[] = $new_record;
			}
			//
			print_r('Uploading...');
			$this->db->insert_batch($table, $database_input);
			$this->load->helper('url');
			redirect('upload/' . $table . '/1', 'refresh');
        }
}
?>
