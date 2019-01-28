<?php
class Upload extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('excel');

    }

    public function index($import_type = 'lmes', $success = null) {
        // temporarily set unlimited memory so that larg files can be uploaded
        $data['title'] = 'Import';
        $data['type'] = $import_type;
        $data['success'] = $success;
        // map column names to import types
        switch ($import_type) {
            case 'lmes':
                $data['required_headers'] = array(
                    "Cluster",
                    "County",
                    "Coordinator_LastName",
                    "Coordinator_FirstName",
                    "LME_LastName",
                    "LME_FirstName",
                    "SubCounty",
                    "PhoneNumber",
                    "LME_Category"
                );
                break;
            case 'products':
                $data['required_headers'] = array(
                    "ProductName",
                    "ProductCategory",
                    "PAYG",
                    "RRP",
                    );
                break;
            case 'coordinators':
                $data['required_headers'] = array(
                    "Cluster",
                    "County",
                    "SubCounty",
                    "Coordinator_LastName",
                    "Coordinator_FirstName",
                    "PhoneNumber"
                    );
                break;
            case 'certifications':
                $data['required_headers'] = array(
                    "Certification"
                    );
                break;
            case 'clusters':
                $data['required_headers'] = array(
                    "Cluster",
                    "County",
                    "SubCounty"
                    );
                break;
            case 'counties':
                $data['required_headers'] = array(
                    "Cluster",
                    "County",
                    "SubCounty",
                    "Ward"
                    );
            case 'product_distribution':
                $data['required_headers'] = array(
                    "Period",
                    "Cluster",
                    "County",
                    "Coordinator_LastName",
                    "Coordinator_FirstName",
                    "LME_LastName",
                    "LME_FirstName",
                    "CustomerCounty",
                    "CustomerSubCounty",
                    "Quantity",
                    );
                break;
            case 'sales':
                $data['required_headers'] = array(
                    "Period",
                    "Cluster",
                    "County",
                    "Coordinator_LastName",
                    "Coordinator_FirstName",
                    "LME_LastName",
                    "LME_FirstName",
                    "ProductName",
                    "Quantity"
                    );
                break;
            case 'receipt_books':
                $data['required_headers'] = array(
                    "BookNumber",
                    "Cluster",
                    "County",
                    "SubCounty",
                    "LME_LastName",
                    "LME_FirstName"
                    );
                break;
            case 'stove_builders':
                $data['required_headers'] = array(
                    "Cluster",
                    "County",
                    "SubCounty",
                    "Ward",
                    "SGroup",
                    "Monitor",
                    "StoveBuilder",
                    "Gender",
                    "PhoneNumber"
                    );
                break;
            case 'stove_producers':
                $data['required_headers'] = array(
                    "Cluster",
                    "County",
                    "SubCounty",
                    "Ward",
                    "ProducerType",
                    "GroupName",
                    "ContactPerson",
                    "PhoneNumber",
                    "Members",
                    "Male",
                    "Female",
                    "Kilns",
                    "Mould"
                    );
                break;
            case 'stove_data':
                $data['required_headers'] = array(
                    "Period",
                    "Cluster",
                    "County",
                    "SubCounty",
                    "Ward",
                    "SGroup",
                    "Monitor",
                    "StoveBuilder",
                    "Gender",
                    "PhoneNumber",
                    "StoveType",
                    "Quantity",
                    "Households"
                    );
                break;
            case 'stove_producers_data':
                $data['required_headers'] = array(
                    "Period",
                    "Cluster",
                    "County",
                    "SubCounty",
                    "Ward",
                    "ProducerType",
                    "StoveType",
                    "GroupName",
                    "Kilns",
                    "Mould",
                    "QtyFired",
                    "QtyGreen",
                    "QtySold"
                    );
                break;
            default:
                $data['required_headers'] = array();
                break;
        }
        if (!empty($_FILES) && isset($_FILES['files']) && $_FILES['files']['tmp_name'] !== "") {
            $data['file'] = $_FILES;
            // PHPExcel cannot work without zip extension so don't continue
            // if it ain't there
            if (extension_loaded('zip')) {
                $fileobj = PHPExcel_IOFactory::load($data['file']['files']['tmp_name']);
                // get worksheet dimensions
                $sheet = $fileobj->getSheet(0); 
                $highestRow = $sheet->getHighestRow(); 
                $highestColumn = $sheet->getHighestColumn();
                //  Loop through each row of the worksheet in turn
                $formatted = array();
                for ($row = 1; $row <= $highestRow; $row++){ 
                    //  Read a row of data into an array
                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                        FALSE);
                    //
                    foreach ($rowData as $key => $value) {
                        /**
                        * Excel files have huge columns and most of them are empty
                        * to avoid running out of meory checking through all of them
                        * the following loop filters through only the columns with actual
                        * data and uses that.
                        * This makes the parsing process way faster
                        */
                        $s = array();
                        foreach ($value as $k => $v) {
                            if ($v) {
                                $s[$k] = $v;
                            }
                        }
                        $formatted[] = $s;
                    }
                }
                // all other columns apart from column one contains data
                $data_array = array_slice($formatted, 1);
                $data['file_results'] = array(
                    'headers' => $formatted[0],
                    'data' => $data_array
                    );
            }
        }
        //
        // file extensions supported currenttly
        $data['supported_types'] = array(
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.ms-excel',
            'text/csv'
            );
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('dashboard_model');
        $this->load->model('reports_model');
        $this->load->helper('url');
        $data['user'] = $this->session->userdata('user');
        $data['no_zip'] = !extension_loaded('zip');
        // don't allow non-login users
        if(!isset($data['user'])) {
            redirect('/user?return_to=' . current_url());
        }
        $data['portal'] = $this->session->userdata('portal');
        $this->load->helper('html');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/import', $data);
        $this->load->view('templates/footer');
    }

    public function save_data($table_name) {
        $this->load->model('upload_model');
        $this->upload_model->save_data($table_name);
    }
}