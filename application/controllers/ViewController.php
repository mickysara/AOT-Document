<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ViewController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
    }
    public function index()
    {
      if($this->session->userdata('_success') == '')
      {
          $this->load->view('Header');
          $this->load->view('LoginAlert');     
          $this->load->view('Footer');
      }else{
        redirect('ViewController/checkstatus');
      }
    }
    
     public function del($id)
     {        
    $this->db->where('Id_Upload', $id);
    $query = $this->db->get('Upload');
    foreach($query->result_array() as $data)
      { 
             
        $file = $data['File'];
        $path = 'uploads/'.$file;
        unlink($path);
      $this->data['delete_data']= $this->Upload->delete_data($id);
      redirect('ViewController','refresh'); 
 
       } 
   
 
     }

    
     public function checkstatus()
    {
        $status = $this->session->userdata('employeeId');
        $this->db->where('Id_Emp', $status);
        $query = $this->db->get('Users');
        foreach($query->result_array() as $data)
      { ?>
              <?php 
              if($data['Status']=='admin')
              {
                $this->load->view('HeaderAdminTest');
                $this->data['view_data']= $this->Upload->view_dataBackend(); //Upfile คือชื่อของโมเดล
                $this->load->view('ViewData', $this->data, FALSE);
                $this->load->view('Footer');
              }else{
                $this->load->view('HeaderAdmin');
                $this->load->view('Adminalert');
                $this->load->view('Footer');
              }
        
               ?>
          
  <?php } 
    }


    public function delfile($id)
    {
      $deletefile = "ลบ";
      $data = array(
      'Status' => $deletefile
  );
      $this->db->where('Id_Upload',$id);
      $this->db->update('Upload',$data);
      // $this->Upload->delstatusfile($this->input->post($id));
          redirect('MyDocumentController','refresh');
    }


    public function delfilerepository($id)
    {
      $deletefile = "ลบ";
      $data = array(
      'status' => $deletefile
  );
      $this->db->where('Id_UploadInRepository',$id);
      $this->db->update('UploadInRepository',$data);

      $this->db->where('Id_UploadInRepository', $id);
      $query = $this->db->get('UploadInRepository');
      $data = $query->row_array();
      redirect('RepositoryController/showdata/'.$data['Id_Repository'],'refresh');
    }
}