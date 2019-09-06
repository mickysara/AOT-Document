<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TypeViewController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Type_Model','Type'); 
    }
    public function index()
    {
      if($this->session->userdata('_success') == '')
      {
          $this->load->view('Header');
          $this->load->view('Loginalert');     
          $this->load->view('Footer');
      }else{
        redirect('TypeViewController/checkstatus');
      }
   
    }
    
     public function del($id){
      $this->data['delete_type']= $this->Type->delete_data($id);
      redirect('TypeViewController','refresh');
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
                $this->load->view('HeaderAdminTest');
                $this->data['view_type']= $this->Type->view_type(); //Upfile คือชื่อของโมเดล
                $this->load->view('TypeView', $this->data, FALSE);     
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
/* End of file IndexController.php */
?>