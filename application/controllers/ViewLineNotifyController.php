<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ViewLineNotifyController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('LineNotify_Model','LineNotify'); 
    }
    public function index()
    {
        $this->load->view('Header');
        $this->data['view_data']= $this->LineNotify->view_data(); //Upfile คือชื่อของโมเดล
        $this->load->view('ViewLineNotify', $this->data, FALSE);
        $this->load->view('Footer');
        
        
        
    }
    
     public function del($id){
        $this->data['delete_data']= $this->LineNotify->delete_data($id);
       redirect('ViewLineNotifyController','refresh');
       
     }
     
     public function editlinenotify(){

        $this->LineNotify->edit_linenotify($this->input->post());
            redirect('ViewLineNotifyController','refresh');
     }

}

/* End of file IndexController.php */

?>