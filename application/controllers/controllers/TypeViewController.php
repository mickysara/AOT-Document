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
        $this->load->view('Header');
        $this->data['view_type']= $this->Type->view_type(); //Upfile คือชื่อของโมเดล
        $this->load->view('TypeView', $this->data, FALSE);
        $this->load->view('Footer');
        
        
        
    }
    
     public function del($id){
        $this->data['delete_type']= $this->Type->delete_data($id);
       redirect('TypeViewController','refresh');
       
     }
}

/* End of file IndexController.php */

?>