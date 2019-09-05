<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RepoController extends CI_Controller {

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
            $this->load->view('Loginalert');     
            $this->load->view('Footer');
        }else{
          redirect('RepoController/checkstatus');
        }
    }
    public function view(){
        $this->data['view_data']= $this->Upload->view_data(); //welcome คือชื่อของโมเดล
        $this->load->view('view', $this->data, FALSE);
            }

    public function insertrepo(){
        // $this->Upload->insertRepo();
        $this->Upload->insertRepo($this->input->post());
        redirect('FileController','refresh');
            }


            public function checkstatus()
            {
                $this->load->view('Header');
                $this->load->view('Footer');
                $this->load->view('Repo');       //เรียกใช้หน้าฟอร์ม
            }
    }