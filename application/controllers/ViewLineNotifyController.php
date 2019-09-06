<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ViewLineNotifyController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Linenotify_Model','LineNotify'); 
    }
    public function index()
    {
      if($this->session->userdata('_success') == '')
      {
          $this->load->view('Header');
          $this->load->view('Loginalert');     
          $this->load->view('Footer');
      }else{
        redirect('ViewLineNotifyController/checkstatus');
      }
    }
    
     public function del($id){
        $this->data['delete_data']= $this->LineNotify->delete_data($id);
       redirect('ViewLineNotifyController','refresh');
       
     }
     
     public function editlinenotify(){
        $this->LineNotify->edit_linenotify($this->input->post());
            redirect('ViewLineNotifyController','refresh');
     }
     public function checkstatus()
     {
         $status = $this->session->userdata('employeeId');
         $this->db->where('employeeId', $status);
         $query = $this->db->get('users');
         foreach($query->result_array() as $data)
       { ?>
               <?php 
               if($data['status']=='admin')
               {
                 $this->load->view('HeaderAdminTest');
                  $this->data['view_data']= $this->LineNotify->view_data(); //Upfile คือชื่อของโมเดล
                  $this->load->view('ViewLineNotify', $this->data, FALSE);
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