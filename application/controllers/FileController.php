<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FileController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Linenotify_Model','LineNotify'); 
    }

    public function index()
    {
        $this->load->view('HeaderAdmin');
        $this->load->view('Footer');
        $this->data['view_data']= $this->LineNotify->view_datadashboard(); //Upfile คือชื่อของโมเดล
        $this->load->view('File', $this->data, FALSE);
        
    }
    public function edit()
    {
        $this->load->view('HeaderAdmin');
        $this->load->view('Footer');
        $this->data['view_data']= $this->LineNotify->view_datadashboard(); //Upfile คือชื่อของโมเดล
        $this->load->view('FileEdit', $this->data, FALSE);
        
    }

}

/* End of file IndexController.php */

?>