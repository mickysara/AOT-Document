<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailDocController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
    }  
    public function index()
    {
        $this->load->view('Header');
        // $this->data['edit_data']= $this->Upload->edit_data(); //Upfile คือชื่อของโมเดล
        // $this->load->view('DetailDoc', $this->data, FALSE);
        // $this->data['edit_data']= $this->Upload->edit_data($edit_id);
        $this->load->view('DetailDoc');
        $this->load->view('Footer');  
        


    }
    public function edit($edit_id){
        $this->data['edit_data']= $this->Upload->edit_data($edit_id);
        $this->load->view('Header');
        $this->load->view('DetailDoc', $this->data, FALSE);
        $this->load->view('Footer');
           }

}

/* End of file DetailDocController.php */
