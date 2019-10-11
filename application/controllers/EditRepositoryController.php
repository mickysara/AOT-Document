<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EditRepositoryController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Repository_Model','repository'); 
    }

    public function edit($edit_id)
    {
        $status = $this->session->userdata('employeeId');
        $this->db->where('Id_Emp', $status);
        $query = $this->db->get('Users');      

        $this->db->where('Id_Emp', $status);
        $query3 = $this->db->get('Repository_Member');
        $admin = $query3->row_array();

        $this->db->where('Id_Repository', $edit_id);
        $query5 = $this->db->get('Repository');
        $repo = $query5->row_array();

        foreach($query->result_array() as $data)
      { ?>
      
              <?php 


              if($this->session->userdata('_success') == '')
              {
                $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
                $this->session->set_userdata('login_referrer', $referrer_value);
                redirect('AlertController/loginalert');

              }else if($admin['Id_Emp'] == $this->session->userdata('employeeId') && $admin['Id_Repository'] == $edit_id && $admin['Level'] == 'Manager'){

                $this->data['edit_repo']= $this->repository->edit_repo($edit_id);
                $this->load->view('Header');
                $this->load->view('EditRepository',$this->data, FALSE);
                $this->load->view('Footer');
              
              }else if($repo['Createby'] == $this->session->userdata('accountName')){

                $this->data['edit_repo']= $this->repository->edit_repo($edit_id);
                $this->load->view('Header');
                $this->load->view('EditRepository',$this->data, FALSE);
                $this->load->view('Footer');

              }else if($data['Status']!='superadmin'){

                redirect('AlertController/superadminalert');

              }else{
                $this->data['edit_repo']= $this->repository->edit_repo($edit_id);
                $this->load->view('Header');
                $this->load->view('EditRepository',$this->data, FALSE);
                $this->load->view('Footer');
              }
        
               ?>
          
  <?php } 

    }


    public function editdatarepo(){

      $status = $this->session->userdata('employeeId');
      $this->db->where('Id_Emp', $status);
      $query3 = $this->db->get('Users');
      $admin = $query3->row_array();


        $this->repository->editdata_repo($this->input->post());
        if($admin['Status'] == 'user' || $admin['Status'] == 'admin'){
        redirect('MyDocumentController','refresh');
        }else{
        redirect('ViewRepositoryController','refresh');
        }
    }

    public function del($id){

        $status = $this->session->userdata('employeeId');
        $this->db->where('Id_Emp', $status);
        $query = $this->db->get('Users');
        foreach($query->result_array() as $data)
      { ?>
              <?php 
              if($data['Status']!='superadmin')
              {
                redirect('AlertController/superadminalert');

              }else{
                $this->data['delete_repo']= $this->repository->delete_repo($id);
                $this->data['delete_chatrepo']= $this->repository->delete_chatrepo($id);
                redirect('ViewRepositoryController','refresh');
              }
        
               ?>
          
  <?php } 
     }

     public function delrepo($id){

      $status = $this->session->userdata('employeeId');
      $this->db->where('Id_Emp', $status);
      $query = $this->db->get('Users');

      $this->db->where('Id_Repository', $id);
      $query5 = $this->db->get('Repository');
      $repo = $query5->row_array();


      foreach($query->result_array() as $data)
    { ?>
            <?php 

            if($repo['Createby'] == $this->session->userdata('accountName')){

              $this->data['delete_repo']= $this->repository->delete_repo($id);
              $this->data['delete_chatrepo']= $this->repository->delete_chatrepo($id);
              redirect('MyDocumentController','refresh');

            }else if($data['Status']!='superadmin')
            {
              redirect('AlertController/superadminalert');

            }else{
              $this->data['delete_repo']= $this->repository->delete_repo($id);
              $this->data['delete_chatrepo']= $this->repository->delete_chatrepo($id);
              redirect('MyDocumentController','refresh');
            }
      
             ?>
        
<?php } 
   }

}

/* End of file IndexController.php */

?>











