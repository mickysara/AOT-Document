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
        $this->data['chat_data']= $this->Chatroom_Model->chatroom_data($id);
        $this->load->view('Header');
        $this->load->view('Inchatroom', $this->data, FALSE);
        $this->load->view('Footer');

    }

    public function sendchat($id_chat)
    {
        $message = $this->input->post('text');
        $sentby  = "354268";//$this->session->userdata('employeeId');
        date_default_timezone_set('Asia/Bangkok');
        $datetime = date("Y-m-d h:i:");

        $data = array(
            "code_chatroom"  =>  $id_chat,
            "message"  =>  $message,
            "sentby"  =>  $sentby,
            "datetime"  =>  $datetime
        );

        $this->db->insert('message', $data);
        
    }

    public function LikeMessage($id_message)
    {
        $likeby = $this->session->userdata('employeeId');
        date_default_timezone_set('Asia/Bangkok');
        $datetime = date("Y-m-d h:i:");

        $data = array(
            "id_message" => $id_message,
            "likeby"     => $likeby,
            "datetime"   => $datetime
        );

        $this->db->insert('like_message', $data);
    }


    public function DisLikeMessage($id_message)
    {
        $likeby = $this->session->userdata('employeeId');
        $this->db->where('id_message', $id_message);
        $this->db->where('likeby', $likeby);
        $this->db->delete('like_message');
        
    }

}

/* End of file InchatroomController.php */
