<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CreatechatroomController extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('CreateChat');
        $this->load->view('Footer');
        
    }

    public function createchatroom($name_room)
    {
        $topic = $this->input->post("topicchat");
        $codechat = random_string('alnum',5);        
        $data = array(
           'code_chatroom' =>   $codechat,
           'topic'         =>   $topic,
           'createby'      =>   $this->session->userdata('accountName'),
           'Date'          =>   date("Y-m-d")
        );
        $this->db->insert('chatroom', $data);

        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $data = $this->db->get('chatroom',1);
        $r = $data->row_array();
        echo json_encode(['status' => 1, 'msg' => 'Success', 'id' => $r['id']]);

       
        
    }


}

/* End of file CreatechatroomController.php */
