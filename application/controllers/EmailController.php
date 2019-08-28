<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class EmailController extends CI_Controller{

    function  __construct(){
        parent::__construct();
        $this->load->helper('url'); //Loading url helper  
        
    }
    
    function send(){
 
   
        $this->load->library('ciqrcode');
        $this->load->library('image_lib');
        
        $this->db->select('*');
        $this->db->order_by('id_upload', 'desc');
        $data = $this->db->get('upload',1);
        $r = $data->row_array();

        $params['data'] = base_url().'/DetailDocController/download/'.$r['url'];
        $params['level'] = 'H';
        $params['size'] = 50;
        $params['savename'] = FCPATH.'./assets/img/qrcode/'. $r['qr_codename'].'.png';
        $this->ciqrcode->generate($params);
        
       // echo '<img src="'.base_url().'asd.png" style="width: 250px; height: 250px;" />';

        $config['source_image'] = FCPATH.'./assets/img/qrcode/'.$r['qr_codename'].'.png';
        $config['image_library'] = 'gd2';
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = './AOT.jpg';//the overlay image
        $config['wm_x_transp'] = 115;
        $config['wm_y_transp'] = 83.25;
        $config['width'] = 50;
        $config['height'] = 50;
        $config['padding'] = 50;
        $config['wm_opacity'] = 100;
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'center';
        
        $this->image_lib->initialize($config);
        if (!$this->image_lib->watermark()) {
            $response['wm_errors'] = $this->image_lib->display_errors();
            $response['wm_status'] = 'error';
        } else {
            $response['wm_status'] = 'success';
        }
        redirect('ViewController');

    }
    function genQrChat(){
 
   
        $this->load->library('ciqrcode');
        $this->load->library('image_lib');
        
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $data = $this->db->get('chatroom',1);
        $r = $data->row_array();

        $params['data'] = base_url().'/InchatroomController/showchat/'.$r['id'];
        echo $params['data'];
        $params['level'] = 'H';
        $params['size'] = 50;
        $params['savename'] = FCPATH.'./assets/img/qrcode/chatroom/'. $r['code_chatroom'].'.png';
        $this->ciqrcode->generate($params);
        
        echo '<img src="'.base_url().'asd.png" style="width: 250px; height: 250px;" />';

        $config['source_image'] = FCPATH.'./assets/img/qrcode/chatroom/'. $r['code_chatroom'].'.png';
        $config['image_library'] = 'gd2';
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = './AOT.jpg';//the overlay image
        $config['wm_x_transp'] = 115;
        $config['wm_y_transp'] = 83.25;
        $config['width'] = 50;
        $config['height'] = 50;
        $config['padding'] = 50;
        $config['wm_opacity'] = 100;
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'center';
        
        $this->image_lib->initialize($config);
        if (!$this->image_lib->watermark()) {
            $response['wm_errors'] = $this->image_lib->display_errors();
            $response['wm_status'] = 'error';
        } else {
            $response['wm_status'] = 'success';
        }
  

    }
}
