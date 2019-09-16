<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CreatechatroomController extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('CreateChat');
        $this->load->view('Footer');
        
    }

    public function createchatroom()
    {
        $id_repository = $this->input->post('id_repository');
        $name_room = $this->input->post('name_room');
                 $this->db->where('id_repository', $id_repository);
        $query = $this->db->get('chatroom', 1);
        $result = $query->num_rows();
        $id = $query->row_array();
        
        if($result == 0)
        {
            $codechat = random_string('alnum',5);        
            $data = array(
               'code_chatroom' =>   $codechat,
               'topic'         =>   $name_room,
               'createby'      =>   $this->session->userdata('accountName'),
               'id_repository' =>   $id_repository,
               'Date'          =>   date("Y-m-d")
            );
            $this->db->insert('chatroom', $data);
            
            
            $this->load->library('ciqrcode');
            $this->load->library('image_lib');
            
            $this->db->select('*');
            $this->db->order_by('id', 'desc');
            $data = $this->db->get('chatroom',1);
            $r = $data->row_array();
    
            $params['data'] = base_url().'/InchatroomController/showchat/'.$r['id'];
            $params['level'] = 'H';
            $params['size'] = 50;
            $params['savename'] = FCPATH.'./assets/img/qrcode/chatroom/'. $r['code_chatroom'].'.png';
            $this->ciqrcode->generate($params);
    
    
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
    
    
            $this->db->select('*');
            $this->db->order_by('id', 'desc');
            $data = $this->db->get('chatroom',1);
            $r = $data->row_array();

            echo json_encode(['status' => 1, 'msg' => 'Success', 'id' => $r['id']]);
            
        }else{

            echo json_encode(['status' => 0, 'msg' => 'Success', 'id' => $id['id']]);

        }
        

    }


}

/* End of file CreatechatroomController.php */
