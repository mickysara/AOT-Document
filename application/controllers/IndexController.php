<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload');
        $this->output->set_header('Access-Control-Allow-Origin: *');
    }
    public function index()
    {
        $this->load->view('Header');
        $this->data['view_data']= $this->Upload->view_data(); //Upfile คือชื่อของโมเดล
        $this->load->view('Home', $this->data, FALSE);
        $this->load->view('Footer');
        
        
        
    }
    public function Test()
    {
        echo $this->session->userdata('status');
    }

}

/* End of file IndexController.php */

?>
