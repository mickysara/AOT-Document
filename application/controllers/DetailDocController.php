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
        $this->db->where('Id_Emp', $status);
        $query3 = $this->db->get('Users');
        $admin = $query3->row_array();

        $this->db->where('Id_Upload', $edit_id);
        $query = $this->db->get('Upload');
        $data = $query->row_array();

        // $this->db->where('Id_Repository', $data['Id_Repository']);
        // $query2 = $this->db->get('Repository_Member');
        // $data2 = $query2->row_array();


            if($data['Uploadby']==$this->session->userdata('accountName') && $data['Status'] != 'ลบ' && $data['Status'] != 'หมดอายุ')
            {
              $this->data['edit_data']= $this->Upload->edit_data($edit_id);
              $this->load->view('Header');
              $this->load->view('DetailDoc', $this->data, FALSE);
              $this->load->view('Footer');

            // }else if($data['Id_Repository'] == 0 && $data['Status'] != 'ลบ')
            // {
            //     $this->data['edit_data']= $this->Upload->edit_data($edit_id);
            //     $this->load->view('Header');
            //     $this->load->view('DetailDoc', $this->data, FALSE);
            //     $this->load->view('Footer');
 
            // }else if($data2['AccName'] == $this->session->userdata('accountName')&& $data['Status'] != 'ลบ')
            // {
            //     $this->data['edit_data']= $this->Upload->edit_data($edit_id);
            //     $this->load->view('Header');
            //     $this->load->view('DetailDoc', $this->data, FALSE);
            //     $this->load->view('Footer');

            }else if($admin['Status']== 'admin' && $data['Status'] != 'ลบ' && $data['Status'] != 'หมดอายุ')
            {
                $this->data['edit_data']= $this->Upload->edit_data($edit_id);
                $this->load->view('Header');
                $this->load->view('DetailDoc', $this->data, FALSE);
                $this->load->view('Footer');

            }else if($data['Privacy']== 'Public' && $data['Status'] != 'ลบ' && $data['Status'] != 'หมดอายุ')
            {
                $this->data['edit_data']= $this->Upload->edit_data($edit_id);
                $this->load->view('Header');
                $this->load->view('DetailDoc', $this->data, FALSE);
                $this->load->view('Footer');
            }else if($data['Status'] == 'ลบ'|| $data['Status'] == 'หมดอายุ')
            {
                redirect('AlertController/downloadalert');
            }else{
                redirect('AlertController/useralert');
            }
        }

        public function editrepo($edit_id)
        {
            $status = $this->session->userdata('employeeId');
            $this->db->where('Id_Emp', $status);
            $query3 = $this->db->get('Users');
            $admin = $query3->row_array();
    
            $this->db->where('Id_UploadInRepository', $edit_id);
            $query = $this->db->get('UploadInRepository');
            $data = $query->row_array();
    
            // $this->db->where('Id_Repository', $data['Id_Repository']);
            // $query2 = $this->db->get('Repository_Member');
            // $data2 = $query2->row_array();
    
    
                if($data['Uploadby']==$this->session->userdata('accountName') && $data['Status'] != 'ลบ')
                {
                  $this->data['edit_data']= $this->Upload->edit_datarepo($edit_id);
                  $this->load->view('Header');
                  $this->load->view('DetailDocRepository', $this->data, FALSE);
                  $this->load->view('Footer');
    
                // }else if($data['Id_Repository'] == 0 && $data['Status'] != 'ลบ')
                // {
                //     $this->data['edit_data']= $this->Upload->edit_data($edit_id);
                //     $this->load->view('Header');
                //     $this->load->view('DetailDoc', $this->data, FALSE);
                //     $this->load->view('Footer');
     
                // }else if($data2['AccName'] == $this->session->userdata('accountName')&& $data['Status'] != 'ลบ')
                // {
                //     $this->data['edit_data']= $this->Upload->edit_data($edit_id);
                //     $this->load->view('Header');
                //     $this->load->view('DetailDoc', $this->data, FALSE);
                //     $this->load->view('Footer');
    
                }else if($admin['Status']== 'admin' && $data['Status'] != 'ลบ')
                {
                    $this->data['edit_data']= $this->Upload->edit_data($edit_id);
                    $this->load->view('Header');
                    $this->load->view('DetailDoc', $this->data, FALSE);
                    $this->load->view('Footer');
    
                }else if($data['Privacy']== 'Public' && $data['Status'] != 'ลบ')
                {
                    $this->data['edit_data']= $this->Upload->edit_data($edit_id);
                    $this->load->view('Header');
                    $this->load->view('DetailDoc', $this->data, FALSE);
                    $this->load->view('Footer');
                }else if($data['Status'] == 'ลบ')
                {
                    $this->load->view('Header');
                    $this->load->view('DownloadAlert');     
                    $this->load->view('Footer');
                }else{
                  $this->load->view('Header');
                  $this->load->view('Useralert');
                  $this->load->view('Footer');
                }
            }

    public function download($url)
    {
        $this->db->where('Url', $url);
        $query = $this->db->get('Upload');
        $dataload = $query->row_array();
        if($dataload['Privacy']=='Private' && $this->session->userdata('accountName') !== $dataload['Uploadby'] && $dataload['Status'] == 'ใช้งาน')
        {
            $this->load->view('Header');
            $this->load->view('Useralert');     
            $this->load->view('Footer');
        }else if($dataload['Privacy']=='Private' && $this->session->userdata('_success') == '' && $dataload['Status'] == 'ใช้งาน')
        {
            $this->load->view('Header');
            $this->load->view('LoginAlert');     
            $this->load->view('Footer');

        }else if($dataload['Privacy']=='Authen' && $this->session->userdata('_success') == '' && $dataload['Status'] == 'ใช้งาน')
        {
            $this->load->view('Header');
            $this->load->view('LoginAlert');     
            $this->load->view('Footer');

        }else if($dataload['Status'] == 'ลบ')
        {
            $this->load->view('Header');
            $this->load->view('DownloadAlert');     
            $this->load->view('Footer');
        }else
        {
        $this->load->helper('download');
        $this->db->where('Url', $url);
        $data = $this->db->get('Upload', 1);
        $fileInfo = $data->result_array();
        foreach($fileInfo as $d)
        {

        $object = array(
            'Download' => $d['Download']+1
        );
        $this->db->where('Id_Upload', $d['Id_Upload']);
        $this->db->update('Upload', $object);

            echo $d['File'];

            //Path File
            $file = 'uploads/'.$d['File'];
            force_download($file, NULL);
        }
      }
    }
    public function downloadqrcode($url)
    {
        $this->load->helper('download');
        $this->db->where('Url', $url);
        $data = $this->db->get('Upload', 1);
        $fileInfo = $data->result_array();
        foreach($fileInfo as $d)
        {

        $object = array(
            'Download' => $d['Download']+1
        );
        $this->db->where('Id_Upload', $d['Id_Upload']);
        $this->db->update('Upload', $object);
            echo $d['Qr_Codename'];

            //Path File
            $file = './assets/img/qrcode/'.$d['Qr_Codename'].'.png';
            force_download($file, NULL);
        }
    }
    


    public function downloadrepo($url)
    {
        $this->db->where('Url', $url);
        $query = $this->db->get('UploadInRepository');
        $dataload = $query->row_array();
        if($dataload['Privacy']=='Private' && $this->session->userdata('accountName') !== $dataload['Uploadby'] && $dataload['Status'] == 'ใช้งาน')
        {
            $this->load->view('Header');
            $this->load->view('Useralert');     
            $this->load->view('Footer');
        }else if($dataload['Privacy']=='Private' && $this->session->userdata('_success') == '' && $dataload['Status'] == 'ใช้งาน')
        {
            $this->load->view('Header');
            $this->load->view('LoginAlert');     
            $this->load->view('Footer');

        }else if($dataload['Privacy']=='Authen' && $this->session->userdata('_success') == '' && $dataload['Status'] == 'ใช้งาน')
        {
            $this->load->view('Header');
            $this->load->view('LoginAlert');     
            $this->load->view('Footer');

        }else if($dataload['Status'] == 'ลบ')
        {
            $this->load->view('Header');
            $this->load->view('DownloadAlert');     
            $this->load->view('Footer');
        }else
        {
        $this->load->helper('download');
        $this->db->where('Url', $url);
        $data = $this->db->get('UploadInRepository', 1);
        $fileInfo = $data->result_array();
        foreach($fileInfo as $d)
        {

        $object = array(
            'Download' => $d['Download']+1
        );
        $this->db->where('Id_UploadInRepository', $d['Id_UploadInRepository']);
        $this->db->update('UploadInRepository', $object);

            echo $d['File'];

            //Path File
            $file = 'uploads/'.$d['File'];
            force_download($file, NULL);
        }
      }
    }
    public function downloadqrcoderepo($url)
    {
        $this->load->helper('download');
        $this->db->where('Url', $url);
        $data = $this->db->get('UploadInRepository', 1);
        $fileInfo = $data->result_array();
        foreach($fileInfo as $d)
        {

        $object = array(
            'Download' => $d['Download']+1
        );
        $this->db->where('Id_UploadInRepository', $d['Id_UploadInRepository']);
        $this->db->update('UploadInRepository', $object);
            echo $d['Qr_Codename'];

            //Path File
            $file = './assets/img/qrcode/'.$d['Qr_Codename'].'.png';
            force_download($file, NULL);
        }
    }
}

/* End of file DetailDocController.php */
