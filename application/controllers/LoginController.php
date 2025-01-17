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

      $this->db->where('Id_Emp', $username);
      $this->db->where('Password', $password);
      $query = $this->db->get('Users', 1);
      
        
         
         if($query->num_rows() == 1)
         {
           $data = $query->row_array();
           $data['_success'] = 1;
           $data['employeeId'] = $data['Id_Emp'];
           $data['accountName'] = $data['AccName'];
           $this->session->set_userdata($data);

           if($this->session->userdata('login_referrer')!=""){
            $tmp_referrer = $this->session->userdata('login_referrer');
            $this->session->unset_userdata('login_referrer');

            echo json_encode(['status' => 2, 'msg' => 'Success', 'data' => $tmp_referrer]);
            }else
            {
              echo json_encode(['status' => 1, 'msg' => 'Success']);
            }

           $ipaddress = '';
           if (getenv('HTTP_CLIENT_IP'))
               $ipaddress = getenv('HTTP_CLIENT_IP');
           else if(getenv('HTTP_X_FORWARDED_FOR'))
               $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
           else if(getenv('HTTP_X_FORWARDED'))
               $ipaddress = getenv('HTTP_X_FORWARDED');
           else if(getenv('HTTP_FORWARDED_FOR'))
               $ipaddress = getenv('HTTP_FORWARDED_FOR');
           else if(getenv('HTTP_FORWARDED'))
               $ipaddress = getenv('HTTP_FORWARDED');
           else if(getenv('REMOTE_ADDR'))
               $ipaddress = getenv('REMOTE_ADDR');
           else
               $ipaddress = 'UNKNOWN';
        
           $ip = explode(',',$ipaddress);
           
           $object = array(
             'Id_Emp' =>  $data['Id_Emp'],
             'Ip'     =>  $ip[0],
             'Action' =>  'เข้าสู่ระบบ'
           );
           $this->db->insert('Logs', $object);
           
         

          
           
         }else{
          echo json_encode(['status' => 0, 'msg' => 'fail']);
      
          
         }
      
    }

    public function Logout()
    {
      $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
     
        $ip = explode(',',$ipaddress);
        
        $object = array(
          'Id_Emp' =>  $this->session->userdata('employeeId'),
          'Ip'     =>  $ip[0],
          'Action' =>  'ออกจากระบบ'
        );
        $this->db->insert('Logs', $object);
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
                <p> <i class="fa fa-user-plus" aria-hidden="true" style="color: #172b4d;"></i> เมื่อ <?php echo date('d/m/Y ', strtotime($d['Date']));?></p>
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