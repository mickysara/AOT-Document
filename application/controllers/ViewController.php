<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ViewController extends CI_Controller {
    
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
        redirect('ViewController/checkstatus');
      }
    }
    
     public function del($id)
     {      
         $this->db->select('*');
        $this->db->where('Id_Upload', $id);
        $result = $this->db->get('Upload');
        $data = $result->row_array();

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
          'Action' =>  'ลบหัวข้อชื่อ : '.$data['Topic'] . ',ไฟล์ชื่อ : ' . $data['File']
        );
        $this->db->insert('Logs', $object);

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
              $this->db->where('Id_Upload', $id);
              $query = $this->db->get('Upload');
             foreach($query->result_array() as $data)
              {                    
                $file = $data['File'];
                $path = 'uploads/'.$file;
                unlink($path);
              $this->data['delete_data']= $this->Upload->delete_data($id);
              redirect('ViewController','refresh'); 
        
              } 
            }
      
             ?>
        
<?php } 
      
     }

    
     public function checkstatus()
    {
      if($this->session->userdata('_success') == '')
      { 
        $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
        $this->session->set_userdata('login_referrer', $referrer_value);
        redirect('AlertController/loginalert');
      }else{
        $status = $this->session->userdata('employeeId');
        $this->db->where('Id_Emp', $status);
        $query = $this->db->get('Users');
        foreach($query->result_array() as $data)
      { ?>
              <?php 
              if($data['Status']=='admin'|| $data['Status']=='superadmin')
              {
                $this->load->view('Header');
                $this->data['view_data']= $this->Upload->view_dataBackend(); //Upfile คือชื่อของโมเดล
                $this->load->view('ViewData', $this->data, FALSE);
                $this->load->view('Footer');
              }else{
                redirect('AlertController/adminalert');
              }
        
               ?>
          
  <?php } 
      }
    }


    public function delfile($id)
    {
      $this->db->select('*');
      $this->db->where('Id_Upload', $id);
      $result = $this->db->get('Upload');
      $data = $result->row_array();

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
        'Action' =>  'ลบหัวข้อชื่อ : '.$data['Topic'] . ',ไฟล์ชื่อ : ' . $data['File']
      );
      $this->db->insert('Logs', $object);
      $deletefile = "ลบ";
      $data = array(
      'Status' => $deletefile
  );
      $this->db->where('Id_Upload',$id);
      $this->db->update('Upload',$data);
      // $this->Upload->delstatusfile($this->input->post($id));
          redirect('MyDocumentController','refresh');
    
  }


    public function delfilerepository($id)
    {
      $this->db->select('*');
      $this->db->where('Id_UploadInRepository', $id);
      $result = $this->db->get('UploadInRepository');
      $data = $result->row_array();

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
        'Action' =>  'ลบหัวข้อชื่อ : '.$data['Topic'] . ',ไฟล์ชื่อ : ' . $data['File']
      );
      $this->db->insert('Logs', $object);

      $deletefile = "ลบ";
      $data = array(
      'status' => $deletefile
  );
      $this->db->where('Id_UploadInRepository',$id);
      $this->db->update('UploadInRepository',$data);

      $this->db->where('Id_UploadInRepository', $id);
      $query = $this->db->get('UploadInRepository');
      $data = $query->row_array();
      redirect('RepositoryController/showdata/'.$data['Id_Repository'],'refresh');
    }
}