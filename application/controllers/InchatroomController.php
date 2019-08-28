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
        $datetime = date("d-m-Y h:i:");

        $data = array(
            "code_chatroom"  =>  $id_chat,
            "message"  =>  $message,
            "sentby"  =>  $sentby,
            "datetime"  =>  $datetime
        );

        $this->db->insert('message', $data);
        
    }

}

/* End of file InchatroomController.php */
