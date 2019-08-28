<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatroomController extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Chatroom');
        $this->load->view('Footer');
    }

    public function joinroom()
    {
        
        $Chatcode = $this->input->post("Chatroom");

                $this->db->where('code_chatroom', $Chatcode);
        $query = $this->db->get('chatroom',1);
        $data  = $query->result_array();
        $code = "hi";
        if($data == null)
        {
            
            echo json_encode(['status' => 0, 'msg' => 'Fail']);
        }else{

            $data = array_shift($data);
            echo json_encode(['status' => 1, 'msg' => 'Success', 'data' => $data['code_chatroom']]);
        }
        
    }

    public function inchatroom($id)
    {
        $this->load->view('Header');
        $this->load->view('', $data, FALSE);
        
        

    }

}

/* End of file TestfullframeController.php */
