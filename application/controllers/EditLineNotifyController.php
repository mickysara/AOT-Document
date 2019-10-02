<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EditLineNotifyController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Linenotify_Model','Linenotify'); 
    }
    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Footer');
        $this->load->view('EditLinenotify');  
    }
    public function edit($edit_id)
    {
        if($this->session->userdata('_success') == '')
        {
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('AlertController/loginalert');
        }else{
            $this->data['edit_data']= $this->Linenotify->edit_data($edit_id);
            $this->load->view('Header');
            $this->load->view('EditLinenotify', $this->data, FALSE);
            $this->load->view('Footer');
        }
    }

    public function editdata(){
          $this->Linenotify->edit_linenotify($this->input->post());
           redirect('ViewLineNotifyController','refresh');
    }

}

/* End of file IndexController.php */

?>