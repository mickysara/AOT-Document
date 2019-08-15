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
        $this->load->view('Header');
        $this->load->view('Footer');
        // $this->data['view_data']= $this->Upload->view_data(); //Upfile คือชื่อของโมเดล
        $this->load->view('Repo');       //เรียกใช้หน้าฟอร์ม
      
        
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


        
    }