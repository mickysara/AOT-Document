<?php
class LinenotifyController extends CI_Controller
{

    public function _construct()
    {
        parent::_construct();
    }
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('Header');
        $this->load->view('LineNotify');
        $this->load->view('Footer');
    }

    public function notify()
    {
                
        $probem =  $this->input->post('probem');
        $Name = $this->input->post('Name');
        $email = $this->input->post('email');
        $tel = $this->input->post('tel');

        $data = 'แจ้งปัญหารายละเอียด :'.$probem.'|ชื่อผู้แจ้ง :'.$Name.'|Email :'.$email.'|เบอร์ติดต่อ :'.$tel;
        echo $data;
        $this->load->model('Linenotify_Model');
        $this->Linenotify_Model->LineNotify($data);
        echo json_encode(['status' => 1, 'msg' => '555']);
        redirect('http://localhost/SystemOfUniver/index.php/LoginController','refresh');
    }
}