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
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('AlertController/loginalert');
        }else{
          redirect('RepoController/checkstatus');
        }
      
        
    }
    public function view(){
        $this->data['view_data']= $this->Upload->view_data(); //welcome คือชื่อของโมเดล
        $this->load->view('view', $this->data, FALSE);
            }

    public function insertrepo()
    {
        // $this->Upload->insertRepo();
        $this->Upload->insertRepo($this->input->post());
        $this->db->select('*');
        $this->db->order_by('Id_Repository', 'desc');
        $result = $this->db->get('Repository',1);
        $data = $result->row_array();

        
        redirect('RepositoryController/showdata/'.$data['Id_Repository'],'refresh');
        
        
    }

    public function checkstatus()
    {
        $this->load->view('Header');
        $this->load->view('Footer');
        $this->load->view('Repo');       //เรียกใช้หน้าฟอร์ม
        

    }
    public function CheckTopic()
        {
          $topic = $this->input->post("topic");
          $this->db->where('Topic', $topic);
          $query = $this->db->get('Repository', 1);

            if($query->num_rows() == 0)
            {
              echo json_encode(['status' => 1, 'msg' => 'Success']);
               
            }else{
              echo json_encode(['status' => 0, 'msg' => 'fail']);
            }

          
        }
        public function pagerepo()
        {
            $this->db->order_by('Id_Repository', 'desc');
            $result = $this->db->get('Repository',1);
            $data = $result->row_array();
            redirect('RepositoryController/showdata/'.$data['Id_Repository']);
            
            
    
        }
    }