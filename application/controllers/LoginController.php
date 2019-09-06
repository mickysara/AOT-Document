<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

  public function _construct()
  {
      parent::_construct();
  }
    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Login');
        $this->load->view('Footer');
        //echo $this->session->userdata('_success');
      
    }
    public function Login()
    {
      $username =  $this->input->post("username");
      $password =  $this->input->post("password");

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.airportthai.co.th/v2/Authen/AuthenUser/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "username=" . $username . "&password=" . $password,
        //CURLOPT_POSTFIELDS => "username=".$username."&password=".$password,
        CURLOPT_HTTPHEADER => array(
          "Postman-Token: c3c8b2b9-146d-4a89-b633-be954b49d589",
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

         $data = json_decode($response, 1);
        
         
         if($data['_success'] == 1)
         {
           
                $this->db->where('employeeId', $data['employeeId']);
          $query = $this->db->get('users', 1);
          $result = $query->num_rows();
          
          if($result == 0)
          {
            $dbinsert = array(
              'employeeId'  =>  $data['employeeId'],
              'status'      =>  'user'
            );
            $this->db->insert('users', $dbinsert);
            $data['status'] = $d['user'];
          }else{
            $d = $query->row_array();

            $data['status'] = $d['status'];
          }
          
           echo json_encode(['status' => 1, 'msg' => 'Success']);
           

           $this->session->set_userdata($data);
         

          
           
         }else{
          echo json_encode(['status' => 0, 'msg' => 'fail']);
      
          
         }
      }
    }

    public function Logout()
    {
      session_destroy();
        
      redirect('/IndexController','refresh');
    }

    public function IncreaseNoti()
    {
      $accname = $this->session->userdata('accountName');
      $this->db->where('Notification', '1');
      $this->db->where('accname', 'sontaya.w');
      $user = $this->db->get('noti');

 
      echo json_decode($user->num_rows());
    }

    public function IncreaseDetailNoti()
    {
      $this->db->where('accname', $this->session->userdata('accountName'));
      $this->db->order_by('Timestamp', 'desc');
      $query = $this->db->get('noti');
      foreach($query->result_array() as $d)
      {
        if($d['Action'] == "comment") 
        {?>
        <div>
            <a class="dropdown-item" href="#">
              <p style="font-weight: bold;"> <?=trim($d['ActionBy'])?> </p> 
              <p> ได้แสดงความคิดเห็นในเอกสารของคุณ </p> 
              <p> <i class="fa fa-comment" aria-hidden="true" style="color: #46bf2e;">  </i> เมื่อ <?=trim($d['Timestamp'])?></p>
            </a>
              <div class="dropdown-divider"></div>
           
        </div>
      <?php 
        }else{ ?>
            <div>
              <a class="dropdown-item" href="#">
                <p style="font-weight: bold;"> <?=trim($d['ActionBy'])?> </p> 
                <p> ได้ให้สิทธิ์ในการเข้าถึงเอกสารแก่คุณ</p> 
                <p> <i class="fa fa-user-plus" aria-hidden="true" style="color: #172b4d;"></i> เมื่อ <?=trim($d['Timestamp'])?></p>
              </a>
            <div class="dropdown-divider"></div>
           
        </div>
      <?php  } 
      }
    
  
    }

    public function DecreaseNoti()
    {
      $accname = $this->session->userdata('accountName');

      $this->db->set('Notification', '0');
      $this->db->where('accname', $accname);
      $this->db->update('noti');
      

 
      
    }
    
}

/* End of file LoginController.php */

?>