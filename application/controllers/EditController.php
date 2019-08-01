<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EditController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
    }
    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Footer');
        // $this->data['edit_data']= $this->Upload->edit_data($edit_id);
        // $this->data['edit_data_image']= $this->Upload->edit_data_image($edit_id);
        $this->load->view('Edit');  
    }
    public function edit($edit_id)
    {
        $this->data['edit_data']= $this->Upload->edit_data($edit_id);
        $this->load->view('Header');
        $this->load->view('Edit', $this->data, FALSE);
        $this->load->view('Footer');
    }

    public function editdata(){
       $this->UploadFile_Model->editdataupload();
       redirect('ViewController','refresh');
    }

}

/* End of file IndexController.php */

?>