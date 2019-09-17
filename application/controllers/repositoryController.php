<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RepositoryController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('repository_model'); 
    }  

    public function index()
    {
        $this->load->view('Header');
        $this->data['repository_view']= $this->repository_model->repository_view(); //Upfile คือชื่อของโมเดล
        $this->load->view('repository', $this->data, FALSE);
        $this->load->view('Footer');
        
    }

    public function showdata($repository_id)
    {
        $query=$this->db->query("SELECT repository_member.*,repository.topic,repository.createby 
        FROM repository_member,repository 
        WHERE repository_member.id_repository = $repository_id 
        AND repository_member.id_repository =".$repository_id);
        $mem = $query->row_array();

        $this->db->where('id', $repository_id);
        $query2 = $this->db->get('repository');
        $data = $query2->row_array();
        
        $this->db->where('employeeId', $this->session->userdata('employeeId'));
        $query3 = $this->db->get('users');
        $admin = $query3->row_array();


            if($this->session->userdata('accountName')==$mem['accname'] && $this->session->userdata('_success') == 1)
            {
                $this->data['repository_data']= $this->repository_model->repository_data($repository_id);
                $this->load->view('Header');
                $this->load->view('repository', $this->data, FALSE);
                $this->load->view('Footer');

            }else if($this->session->userdata('accountName')== $data['createby'])
            {
                $this->data['repository_data']= $this->repository_model->repository_data($repository_id);
                $this->load->view('Header');
                $this->load->view('repository', $this->data, FALSE);
                $this->load->view('Footer');

            }else if($admin['status']== 'admin')
            {
                $this->data['repository_data']= $this->repository_model->repository_data($repository_id);
                $this->load->view('Header');
                $this->load->view('repository', $this->data, FALSE);
                $this->load->view('Footer');

            }else if($data['privacy'] == 'Public')
            {
                $this->data['repository_data']= $this->repository_model->repository_data($repository_id);
                $this->load->view('Header');
                $this->load->view('repository', $this->data, FALSE);
                $this->load->view('Footer');

            }else if($this->session->userdata('_success') == '')
            {
                $this->load->view('Header');
                $this->load->view('LoginAlert');
                $this->load->view('Footer');

            }else{
              $this->load->view('Header');
              $this->load->view('Useralert');
              $this->load->view('Footer');
            }
      
        }
    //     $this->data['repository_data']= $this->Repository_Model->repository_data($repository_id);
    //     $this->load->view('Header');
    //     $this->load->view('repository', $this->data, FALSE);
    //      $this->load->view('Footer');
    //  }
}

/* End of file repositoryController.php */
