<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ViewFileDeleteController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','delfile'); 
    }
    public function index()
    {
        $this->load->view('Header');
        $this->data['view_data']= $this->delfile->view_datadelete(); //Upfile คือชื่อของโมเดล
        $this->load->view('ViewFileDelete', $this->data, FALSE);
        $this->load->view('Footer');
        
        
        
    }
    
     public function del($id)
     {            
       $this->data['deletedelfile_data']= $this->delfile->deletedelfile_data($id);
       redirect('ViewFileDeleteController','refresh');                

     }
}
         