<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

  public function _construct()
  {
      parent::_construct();
  }
    public function index()
    {
      if($this->session->userdata('_success') == "")
      {
        $this->load->view('Header');
        $this->load->view('Login');      
        $this->load->view('Footer');
      }else{
        redirect('IndexController');
      }
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
           
                $this->db->where('Id_Emp', $data['employeeId']);
          $query = $this->db->get('Users', 1);
          $result = $query->num_rows();
          
          if($result == 0)
          {
            $dbinsert = array(
              'Id_Emp'  =>  $data['employeeId'],
              'Status'      =>  'user'
            );

            $this->db->insert('Users', $dbinsert);
            $data['Status'] = $d['Users'];

          }else{

            $d = $query->row_array();

            $data['Status'] = $d['Status'];

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

      $this->db->where('Notify', '1');
      $this->db->where('Accname', $this->session->userdata('accountName'));
      $user = $this->db->get('Repository_Member');
      echo json_decode($user->num_rows());

    }

    public function IncreaseDetailNoti()
    {

      $this->db->where('Accname', $this->session->userdata('accountName'));
      $this->db->order_by('Date', 'desc');
      $query = $this->db->get('Repository_Member');

        if($query->num_rows() == 0) 
        {?>
        <div>
            <a class="dropdown-item" href="#">
              <p> ไม่มีการแจ้งเตือนของคุณ </p> 
            </a>
              <div class="dropdown-divider"></div>
        </div>
      <?php 
        }else{ 
          foreach($query->result_array() as $d)
          {?>
        
            <div>
              <a class="dropdown-item" href="<?php echo base_url();?>RepositoryController/showdata/<?= $d['Id_Repository'] ?>">
                <p style="font-weight: bold;"> <?=trim($d['AddBy'])?> </p> 
                <?php 
                           $this->db->where('Id_Repository', $d['Id_Repository']);
                  $topic = $this->db->get('Repository', 1);
                  $tt = $topic->row_array();
                ?>
                
                <p> ได้ให้สิทธิ์ในการเข้าถึงเอกสาร <p style="font-weight: bold;"> ชื่อ : <?php echo $tt['Topic']?></p></p> 
                <p> <i class="fa fa-user-plus" aria-hidden="true" style="color: #172b4d;"></i> เมื่อ <?php echo date('d/m/Y ', strtotime($tt['Date']));?></p>
              </a>
            <div class="dropdown-divider"></div>
           
        </div>
      <?php  } 
      }
    
  
    }

    public function DecreaseNoti()
    {

      $accname = $this->session->userdata('accountName');

      $this->db->set('Notify', '0');
      $this->db->where('Accname', $accname);
      $this->db->update('Repository_Member');
      

 
      
    }
    
}

/* End of file LoginController.php */

?>