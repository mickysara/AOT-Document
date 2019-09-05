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
      if($this->session->userdata('_success') == '')
      {
          $this->load->view('Header');
          $this->load->view('Loginalert');     
          $this->load->view('Footer');
      }else{
        redirect('ViewFileDeleteController/checkstatus');
      }
    }
    
     public function del($id)
     {            
       $this->data['deletedelfile_data']= $this->delfile->deletedelfile_data($id);
       redirect('ViewFileDeleteController','refresh');                

     }

     public function checkstatus()
     {
         $status = $this->session->userdata('employeeId');
         $this->db->where('employeeId', $status);
         $query = $this->db->get('adminaot');
         foreach($query->result_array() as $data)
       { ?>
               <?php 
               if($data['status']=='admin')
               {
                 $this->load->view('Header');
                 $this->data['view_data']= $this->delfile->view_datadelete(); //Upfile คือชื่อของโมเดล
                 $this->load->view('ViewFileDelete', $this->data, FALSE);
                 $this->load->view('Footer');
               }else{
                 $this->load->view('HeaderAdmin');
                 $this->load->view('Adminalert');
                 $this->load->view('Footer');
               }
         
                ?>
           
   <?php } 
     }
}
         