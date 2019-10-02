<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatroomController extends CI_Controller {

    public function index()
    {   if($this->session->userdata("_success") == "")
        {
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('AlertController/loginalert');
        }
        else
        {
            $this->load->view('Header');
            $this->load->view('Chatroom');
            $this->load->view('Footer');
        }
    }

    public function joinroom()
    {
        
        $Chatcode = $this->input->post("Chatroom");

                $this->db->where('Code_Chatroom', $Chatcode);
        $query = $this->db->get('Chatroom',1);
        $data  = $query->result_array();
        $code = "hi";
        if($data == null)
        {
            
            echo json_encode(['status' => 0, 'msg' => 'Fail']);
        }else{

            $data = array_shift($data);
            echo json_encode(['status' => 1, 'msg' => 'Success', 'data' => $data['Id_Chatroom']]);
        }
        
    }

    public function inchatroom($id)
    {
        $this->load->view('Header');
        $this->load->view('', $data, FALSE);
        
        

    }

}

/* End of file TestfullframeController.php */
