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

            if($data['Privacy'] == 'Authen' && $this->session->userdata('_success') == '')
            {
                $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
                $this->session->set_userdata('login_referrer', $referrer_value);
                redirect('AlertController/loginalert');

            }else if($admin['Status']== 'superadmin')
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

            }else if($data['Dateend'] <= $data['Date'] && $data['Dateend'] != '1970-01-01')
            {
                $changestatus = "หมดอายุ";
                $data = array(
                'Status' => $changestatus
            );
                $this->db->where('Id_Upload',$edit_id);
                $this->db->update('Upload',$data);
                redirect('AlertController/downloadalert','refresh');


            }else if($this->session->userdata('_success') == 1 && $data['Privacy'] == 'Authen' && $data['Status'] == 'ใช้งาน')
            {
                $this->data['edit_data']= $this->Upload->edit_data($edit_id);
              $this->load->view('Header');
              $this->load->view('DetailDoc', $this->data, FALSE);
              $this->load->view('Footer');

            }else if($data['Uploadby']==$this->session->userdata('accountName') && $data['Status'] != 'ลบ' && $data['Status'] != 'หมดอายุ')
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

            $this->db->where('Id_Repository', $data['Id_Repository']);
            $query2 = $this->db->get('Repository');
            $datarepo = $query2->row_array();

            $this->db->where('Id_Repository', $datarepo['Id_Repository']);
            $query3 = $this->db->get('Repository_Member');
            $datamemcheck = $query3->row_array();

            $this->db->where('Id_Emp', $datamemcheck['Id_Emp']);
            $query4 = $this->db->get('Users');
            $datamem = $query4->row_array();
    
                // if($this->session->userdata('_success') == '')
                // {
                //     $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
                //     $this->session->set_userdata('login_referrer', $referrer_value);
                //     redirect('AlertController/loginalert');
                                
                if($admin['Status']== 'superadmin')
                {
                $this->data['edit_data']= $this->Upload->edit_datarepo($edit_id);
                $this->load->view('Header');
                $this->load->view('DetailDocRepository', $this->data, FALSE);
                $this->load->view('Footer');

                }else if($data['Dateend'] <= $data['Date'] && $data['Dateend'] != '1970-01-01')
                {
                    $changestatus = "หมดอายุ";
                    $data = array(
                    'Status' => $changestatus
                );
                    $this->db->where('Id_UploadInRepository',$edit_id);
                    $this->db->update('UploadInRepository',$data);
                    redirect('AlertController/downloadalert','refresh');

                }else if($data['Status'] != 'ลบ' && $data['Status'] != 'หมดอายุ')
                {
                $this->data['edit_data']= $this->Upload->edit_datarepo($edit_id);
                $this->load->view('Header');
                $this->load->view('DetailDocRepository', $this->data, FALSE);
                $this->load->view('Footer');

                }else if($this->session->userdata('accountName') == $datamem['AccName'])
                {
                    $this->data['edit_data']= $this->Upload->edit_datarepo($edit_id);
                    $this->load->view('Header');
                    $this->load->view('DetailDocRepository', $this->data, FALSE);
                    $this->load->view('Footer');

                }else if($this->session->userdata('_success') == 1 && $data['Status'] == 'ใช้งาน')
                {
                    $this->data['edit_data']= $this->Upload->edit_datarepo($edit_id);
                  $this->load->view('Header');
                  $this->load->view('DetailDocRepository', $this->data, FALSE);
                  $this->load->view('Footer');

                }else if($data['Uploadby']==$this->session->userdata('accountName') && $data['Status'] != 'ลบ' && $data['Status'] != 'หมดอายุ')
                {
                  $this->data['edit_data']= $this->Upload->edit_datarepo($edit_id);
                  $this->load->view('Header');
                  $this->load->view('DetailDocRepository', $this->data, FALSE);
                  $this->load->view('Footer');

                }else if($data['Status'] == 'ลบ' || $data['Status'] == 'หมดอายุ')
                {
                    redirect('AlertController/downloadalert');

                }else{
                    redirect('AlertController/useralert');
                }
            }


    public function download($url)
    {
        $this->db->where('Url', $url);
        $query = $this->db->get('Upload');
        $dataload = $query->row_array();

        $status = $this->session->userdata('employeeId');
        $this->db->where('Id_Emp', $status);
        $query3 = $this->db->get('Users');
        $admin = $query3->row_array();

        if($dataload['Dateend'] <= $dataload['Date'] && $dataload['Dateend'] != '1970-01-01')
        {
            $changestatus = "หมดอายุ";
            $data = array(
            'Status' => $changestatus
        );
            $this->db->where('Url',$url);
            $this->db->update('Upload',$data);
            redirect('AlertController/downloadalert','refresh');

        }else if($dataload['Status'] == 'ลบ' || $dataload['Status'] == 'หมดอายุ')
        {
            redirect('AlertController/downloadalert');

        }else if($dataload['Privacy'] == 'Public')
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

        }else if($this->session->userdata('accountName') !== $dataload['Uploadby'] && $admin['Status'] != 'superadmin')
        {
            redirect('AlertController/useralert');

        }else if($this->session->userdata('_success') == '' && $dataload['Privacy'] != 'Public')
        {
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('AlertController/loginalert');

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
        
        $this->db->where('Id_Repository', $dataload['Id_Repository']);
        $query2 = $this->db->get('Repository');
        $datarepo = $query2->row_array();

        $this->db->where('Id_Repository', $datarepo['Id_Repository']);
        $query3 = $this->db->get('Repository_Member');
        $datamem = $query3->row_array();

        // if($datarepo['Privacy'] == 'Authen' && $this->session->userdata('_success') == '')
        // {
        //     $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
        //     $this->session->set_userdata('login_referrer', $referrer_value);
        //     redirect('AlertController/loginalert');
                    
         if($dataload['Dateend'] <= $dataload['Date'] && $dataload['Dateend'] != '1970-01-01')
        {
            $changestatus = "หมดอายุ";
            $data = array(
            'Status' => $changestatus
        );
            $this->db->where('Url',$url);
            $this->db->update('UploadInRepository',$data);
            redirect('AlertController/downloadalert','refresh');

        }else if($dataload['Status'] == 'ลบ' || $dataload['Status'] == 'หมดอายุ')
        {
            redirect('AlertController/downloadalert');
        
        }else if($datamem['AddBy'] == $this->session->userdata('accountName'))
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
