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
                $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
        $this->session->set_userdata('login_referrer', $referrer_value);
        redirect('AlertController/loginalert');
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
               if($data['Status']=='admin' || $data['Status']=='superadmin' )
               {
                 $this->load->view('HeaderAdminTest');
                  $this->data['view_data']= $this->LineNotify->view_data(); //Upfile คือชื่อของโมเดล
                  $this->load->view('ViewLineNotify', $this->data, FALSE);
                 $this->load->view('Footer');
               }else{
                redirect('AlertController/adminalert');
               }
         
                ?>
           
   <?php } 
      }
     }
}
/* End of file IndexController.php */
?>