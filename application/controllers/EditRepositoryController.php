<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EditRepositoryController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('repository_model','repository'); 
    }
    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Footer');
        $this->load->view('EditRepository');  
    }

    public function edit($edit_id)
    {
        if($this->session->userdata('_success') == '')
        {
            redirect('AlertController/loginalert');
        }else{
            $this->data['edit_repo']= $this->repository->edit_repo($edit_id);
            $this->load->view('Header');
            $this->load->view('EditRepository',$this->data, FALSE);
            $this->load->view('Footer');
        }
    }
    public function editdatarepo(){
        $this->repository->editdata_repo($this->input->post());
        redirect('ViewRepositoryController','refresh');
    }

    public function del($id){
        $this->data['delete_repo']= $this->repository->delete_repo($id);
       redirect('ViewRepositoryController','refresh');
       
     }
}

/* End of file IndexController.php */

?>