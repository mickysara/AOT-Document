<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AlertController extends CI_Controller {

    public function index()
    {
  
    }
    public function loginalert()
    {
        $this->load->view('Header');
        $this->load->view('LoginAlert');      
        $this->load->view('Footer');
    }
    public function useralert()
    {
        $this->load->view('Header');
        $this->load->view('Useralert');      
        $this->load->view('Footer');
    }
    public function adminalert()
    {
        $this->load->view('Header');
        $this->load->view('Adminalert');      
        $this->load->view('Footer');
    }
    public function downloadalert()
    {
        $this->load->view('Header');
        $this->load->view('DownloadAlert');      
        $this->load->view('Footer');
    }
    public function notfoundalert()
    {
        $this->load->view('Header');
        $this->load->view('notfound_view');      
        $this->load->view('Footer');
    }
    public function chatroomalert()
    {
        $this->load->view('Header');
        $this->load->view('ChatroomAlert');      
        $this->load->view('Footer');
    }
    public function superadminalert()
    {
        $this->load->view('Header');
        $this->load->view('SuperAdminAlert');      
        $this->load->view('Footer');
    }

    }



