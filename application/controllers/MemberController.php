<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MemberController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('repositoty_member'); 
    }  
    public function index()
    {
        $this->load->view('Header');
        $this->load->view('member');
        $this->load->view('Footer');
        
    }
    public function showmember($repository_id)
    {
        $this->data['repositoty_memberdata']= $this->repositoty_member->repository_memberdata($repository_id);
        print_r($this->data);
    }
    
    public function checkmember($repository_id)
    {
        $id_emp =  $this->input->post("id_emp");
        $Level  =  $this->input->post("Level");
        $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.airportthai.co.th/v2/ActiveDirectory/GetAccountProfile/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "username=".$id_emp,
            CURLOPT_HTTPHEADER => array(
                "Postman-Token: 72bfb512-ad16-4a16-859c-33e01a58f3e2,1bc475e2-b74b-4bec-a7cd-8cada08d9e12",
                "cache-control: no-cache",
                "x-api-key: 0HyLnGPCibLKetyPyzZJzhfI32d3V3kC2e8FkSt4"
            ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
               $data =  json_decode($response,1);
                    if($data['accountName'] == "")
                    {
                        echo json_encode(['status' => 0, 'msg' => 'Fail']);
                        
                    }else{
                        $this->db->where('Id_emp', $data['employeeId']);
                        $this->db->where('Id_Repository', $repository_id);
                        $query = $this->db->get('Repository_Member', 1);
                        $d = $query->num_rows();

                        if($d == 0)
                        {
                            $this->db->where('Id_Repository', $repository_id);
                            $this->db->where('Createby', $data['accountName']);
                            $q = $this->db->get('Repository', 1);

                            if($q->num_rows() == 0)
                            {
                                $insert = array(
                                    'id_emp' => $data['employeeId'],
                                    'accname' => $data['accountName'],
                                    'id_repository' => $repository_id,
                                    'level' => $Level,
                                    'addBy' => $this->session->userdata('accountName'),
                                    'Notify'  =>  1
                                    );
                                    $this->db->insert('Repository_Member', $insert);                                    
                                    echo json_encode(['status' => 1, 'msg' => 'Success']);
                            }else{
                                echo json_encode(['status' => 2, 'msg' => 'Fail']);
                            }
                            
                        }else
                        {
                            echo json_encode(['status' => 2, 'msg' => 'Fail']);
                        }
                        
                        
                        
                        
                    }
            }
    }
    
    public function editmember($id,$repository_id)
    {
        $level =  $this->input->post("Level");
         $data = array(
             'level' => $level
            
         );
         $this->db->where('Id_RepositoryMember', $id);
         $this->db->update('Repository_Member', $data);

         redirect('repositorycontroller/showdata/'.$repository_id,'refresh');
        
    }
    
    public function Deletemember($id,$repository_id)
    {
        $this->db->where('Id_RepositoryMember', $id);
        $this->db->delete('Repository_Member');
        
        redirect('repositorycontroller/showdata/'.$repository_id,'refresh');
        
    }
}