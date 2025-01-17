<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ViewFileRepositoryController extends CI_Controller {
    
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
        $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
        $this->session->set_userdata('login_referrer', $referrer_value);
        redirect('AlertController/loginalert');
      }else{
        redirect('ViewFileRepositoryController/checkstatus');
      }
    }  
     public function checkstatus()
    {
      if($this->session->userdata('_success') == '')
      {
        $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
        $this->session->set_userdata('login_referrer', $referrer_value);
        redirect('AlertController/loginalert');
      }else{
        $status = $this->session->userdata('employeeId');
        $this->db->where('Id_Emp', $status);
        $query = $this->db->get('Users');
        foreach($query->result_array() as $data)
      { ?>
              <?php 
              if($data['Status']=='admin'|| $data['Status']=='superadmin')
              {
                $this->load->view('Header');
                $this->data['view_data']= $this->Upload->edit_viewrepo(); //Upfile คือชื่อของโมเดล
                $this->load->view('ViewFileRepositoryData', $this->data, FALSE);
                $this->load->view('Footer');
              }else{
                redirect('AlertController/adminalert');
              }
        
               ?>
          
  <?php } 
      }
    }
    public function del($id)
    {      
     $status = $this->session->userdata('employeeId');
     $this->db->where('Id_Emp', $status);
     $query = $this->db->get('Users');
     foreach($query->result_array() as $data)
   { ?>
           <?php 
           if($data['Status']!='superadmin')
           {
             redirect('AlertController/superadminalert');

           }else{
             $this->db->where('Id_UploadInRepository', $id);
             $query = $this->db->get('UploadInRepository');
            foreach($query->result_array() as $data)
             {                    
               $file = $data['File'];
               $path = 'uploads/'.$file;
               unlink($path);
             $this->data['delete_datarepo']= $this->Upload->delete_datarepo($id);
             redirect('ViewFileRepositoryController','refresh'); 
       
             } 
           }
     
            ?>
       
<?php } 
     
    }

}