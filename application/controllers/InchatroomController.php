<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class InchatroomController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Chatroom_Model'); 
    }  

    public function index()
    {

        $this->load->view('Header');
        $this->load->view('Inchatroom');
        $this->load->view('Footer');
        
    }

    public function showchat($id)
    {   
        $this->db->where('Id_Chatroom', $id);
        $query = $this->db->get('Chatroom');
        $data = $query->row_array();

       if($data['Dateend'] <= $data['Date'])
        {
            $changestatus = "หมดอายุ";
            $data = array(
            'Status' => $changestatus
        );
            $this->db->where('Id_Chatroom',$id);
            $this->db->update('Chatroom',$data);
            redirect('AlertController/chatroomalert','refresh');

        }else if($data['Status'] == 'หมดอายุ')
        {

        redirect('AlertController/chatroomalert','refresh');
        
          
        }else{
                if($this->session->userdata("RanDomsess") == "")
                {
                    $random = random_string('alpha',10);

                    $this->session->set_userdata("RanDomsess", $random);
                    
                    $this->data['chat_data']= $this->Chatroom_Model->chatroom_data($id);
                    $this->load->view('Header');
                    $this->load->view('Inchatroom', $this->data, FALSE);
                    $this->load->view('Footer');
                }else{
                    $this->data['chat_data']= $this->Chatroom_Model->chatroom_data($id);
                    $this->load->view('Header');
                    $this->load->view('Inchatroom', $this->data, FALSE);
                    $this->load->view('Footer');
                }
        }

    }

    public function sendchat($id_chat)
    {
        $message = $this->input->post('text');
        $sentby = $this->session->userdata("RanDomsess");
    
        date_default_timezone_set('Asia/Bangkok');


        $data = array(
            "Code_Chatroom"  =>  $id_chat,
            "Message"  =>  $message,
            "Sentby"  =>  $sentby
        );

        $this->db->where('Code_Chatroom', $id_chat);
        $qq1 = $this->db->get('Chatroom', 1);
        $rr1 = $qq1->row_array();

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
          'Action' =>  'โพสข้อความ : ' . $message . ' , ในห้องแชท : ' . $rr1['Topic'] 
        );
        $this->db->insert('Logs', $object);

        $this->db->insert('Message', $data);
        
    }

    public function LikeMessage($id_message)
    {
        $likeby = $this->session->userdata('RanDomsess');
        date_default_timezone_set('Asia/Bangkok');


        $data = array(
            "id_message" => $id_message,
            "likeby"     => $likeby
        );

        $this->db->where('Id_Message', $id_message);
        $qq = $this->db->get('Message', 1);
        $rr = $qq->row_array();

        $this->db->where('Code_Chatroom', $rr['Code_Chatroom']);
        $qq1 = $this->db->get('Chatroom', 1);
        $rr1 = $qq1->row_array();
        
        
        
        

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
          'Action' =>  'กดถูกใจโพสต์ : ' . $rr['Message'] . ' , ในห้องแชท : ' . $rr1['Topic'] 
        );

        $this->db->insert('Logs', $object);
        $this->db->insert('Like_Message', $data);
    }


    public function DisLikeMessage($id_message)
    {
        $likeby = $this->session->userdata('RanDomsess');
        $this->db->where('Id_Message', $id_message);
        $this->db->where('Likeby', $likeby);
        $this->db->delete('Like_Message');
        
        $this->db->where('Id_Message', $id_message);
        $qq = $this->db->get('Message', 1);
        $rr = $qq->row_array();

        $this->db->where('Code_Chatroom', $rr['Code_Chatroom']);
        $qq1 = $this->db->get('Chatroom', 1);
        $rr1 = $qq1->row_array();
        
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
          'Action' =>  'เลิกถูกใจโพสต์ : ' . $rr['Message'] . ' , ในห้องแชท : ' . $rr1['Topic'] 
        );

        $this->db->insert('Logs', $object);
    }

}

/* End of file InchatroomController.php */
