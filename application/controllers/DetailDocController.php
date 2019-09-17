<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailDocController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
    }  
    public function index()
    {
        $this->load->view('Header');
        $this->load->view('DetailDoc');
        $this->load->view('Footer');  
        


    }

    
    public function edit($edit_id)
    {
        $status = $this->session->userdata('employeeId');
        $this->db->where('employeeId', $status);
        $query3 = $this->db->get('users');
        $admin = $query3->row_array();

        $this->db->where('id_upload', $edit_id);
        $query = $this->db->get('upload');
        $data = $query->row_array();

        $this->db->where('id_repository', $data['id_repository']);
        $query2 = $this->db->get('repository_member');
        $data2 = $query2->row_array();


            if($data['uploadby']==$this->session->userdata('accountName'))
            {
              $this->data['edit_data']= $this->Upload->edit_data($edit_id);
              $this->load->view('Header');
              $this->load->view('DetailDoc', $this->data, FALSE);
              $this->load->view('Footer');

            }else if($data['id_repository'] == 0)
            {
                $this->data['edit_data']= $this->Upload->edit_data($edit_id);
                $this->load->view('Header');
                $this->load->view('DetailDoc', $this->data, FALSE);
                $this->load->view('Footer');
 
            }else if($data2['accname'] == $this->session->userdata('accountName'))
            {
                $this->data['edit_data']= $this->Upload->edit_data($edit_id);
                $this->load->view('Header');
                $this->load->view('DetailDoc', $this->data, FALSE);
                $this->load->view('Footer');

            }else if($admin['status']== 'admin')
            {
                $this->data['edit_data']= $this->Upload->edit_data($edit_id);
                $this->load->view('Header');
                $this->load->view('DetailDoc', $this->data, FALSE);
                $this->load->view('Footer');

            }else if($data['privacy']== 'Public')
            {
                $this->data['edit_data']= $this->Upload->edit_data($edit_id);
                $this->load->view('Header');
                $this->load->view('DetailDoc', $this->data, FALSE);
                $this->load->view('Footer');
            }else{
              $this->load->view('Header');
              $this->load->view('Useralert');
              $this->load->view('Footer');
            }
        }

    public function download($url)
    {
        $this->db->where('url', $url);
        $query = $this->db->get('upload');
        $dataload = $query->row_array();
        if($dataload['privacy']=='Private' && $this->session->userdata('accountName') !== $dataload['uploadby'])
        {
            $this->load->view('Header');
            $this->load->view('Useralert');     
            $this->load->view('Footer');
        }else if($dataload['privacy']=='Private' && $this->session->userdata('_success') == '')
        {
            $this->load->view('Header');
            $this->load->view('LoginAlert');     
            $this->load->view('Footer');

        }else if($dataload['privacy']=='Authen' && $this->session->userdata('_success') == '')
        {
            $this->load->view('Header');
            $this->load->view('LoginAlert');     
            $this->load->view('Footer');
        }else
        {
        $this->load->helper('download');
        $this->db->where('url', $url);
        $data = $this->db->get('upload', 1);
        $fileInfo = $data->result_array();
        foreach($fileInfo as $d)
        {

        $object = array(
            'download' => $d['download']+1
        );
        $this->db->where('id_upload', $d['id_upload']);
        $this->db->update('upload', $object);

            echo $d['file'];

            //Path File
            $file = 'uploads/'.$d['file'];
            force_download($file, NULL);
        }
      }
    }
    public function downloadqrcode($url)
    {
        $this->load->helper('download');
        $this->db->where('url', $url);
        $data = $this->db->get('upload', 1);
        $fileInfo = $data->result_array();
        foreach($fileInfo as $d)
        {

        $object = array(
            'download' => $d['download']+1
        );
        $this->db->where('id_upload', $d['id_upload']);
        $this->db->update('upload', $object);
            echo $d['qr_codename'];

            //Path File
            $file = './assets/img/qrcode/'.$d['qr_codename'].'.png';
            force_download($file, NULL);
        }
    }
    

}

/* End of file DetailDocController.php */
