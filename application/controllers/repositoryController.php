<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RepositoryController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Repository_Model'); 
    }  

    public function index()
    {
        $this->load->view('Header');
        $this->data['repository_view']= $this->Repository_Model->repository_view(); //Upfile คือชื่อของโมเดล
        $this->load->view('repository', $this->data, FALSE);
        $this->load->view('Footer');
        
    }

    public function showdata($repository_id)
    {
        $query=$this->db->query("SELECT Repository_Member.*,Repository.Topic,Repository.Createby 
        FROM Repository_Member,Repository 
        WHERE Repository_Member.Id_Repository = $repository_id 
        AND Repository_Member.Id_Repository =".$repository_id);
        $mem = $query->row_array();

        $this->db->where('Id_Repository', $repository_id);
        $query2 = $this->db->get('Repository');
        $data = $query2->row_array();
        
        $this->db->where('Id_Emp', $this->session->userdata('employeeId'));
        $query3 = $this->db->get('Users');
        $admin = $query3->row_array();


            if($this->session->userdata('_success') == '' && $data['Privacy'] == 'Authen')
            {
                redirect('AlertController/loginalert');

            }else if($admin['Status']== 'superadmin')
            {              
                $this->data['repository_data']= $this->Repository_Model->repository_data($repository_id);
                $this->load->view('Header');
                $this->load->view('repository', $this->data, FALSE);
                $this->load->view('Footer');

            }else if($data['Privacy'] == 'Public')
            {
                $this->data['repository_data']= $this->Repository_Model->repository_data($repository_id);
                $this->load->view('Header');
                $this->load->view('repository', $this->data, FALSE);
                $this->load->view('Footer');

            }else if($this->session->userdata('accountName')==$mem['AccName'] && $this->session->userdata('_success') == 1)
            {
                $this->data['repository_data']= $this->Repository_Model->repository_data($repository_id);
                $this->load->view('Header');
                $this->load->view('repository', $this->data, FALSE);
                $this->load->view('Footer');

            }else if($this->session->userdata('accountName')== $data['Createby'])
            {
                $this->data['repository_data']= $this->Repository_Model->repository_data($repository_id);
                $this->load->view('Header');
                $this->load->view('repository', $this->data, FALSE);
                $this->load->view('Footer');

            }else{
                redirect('AlertController/useralert');
            }
      
        }
    //     $this->data['repository_data']= $this->Repository_Model->repository_data($repository_id);
    //     $this->load->view('Header');
    //     $this->load->view('repository', $this->data, FALSE);
    //      $this->load->view('Footer');
    //  }
}

/* End of file repositoryController.php */
