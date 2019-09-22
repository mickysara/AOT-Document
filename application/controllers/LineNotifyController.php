<?php
class LinenotifyController extends CI_Controller
{

    public function _construct()
    {
        parent::_construct();
        $this->load->model('Linenotify_Model','Linenotify'); 
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

        $data = $probem.("/").$Name.("/").$email.("/").$tel;
        $this->load->model('Linenotify_Model');
        $this->Linenotify_Model->insert_Linenotify($data);
        $this->Linenotify_Model->LineNotify($data);
        echo json_encode(['status' => 1, 'msg' => '555']);
        redirect('IndexController','refresh');
        
    }

}