<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminChatroomController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Chatroom_Model'); 
    }  
    public function showchat($id)
    {   
        $this->data['chat_data']= $this->Chatroom_Model->chatroom_data($id);
        $this->load->view('HeaderAdminChatroom');
        $this->load->view('AdminChatroom', $this->data, FALSE);
        $this->load->view('Footer');

    }

    public function IncreaseChatByAsc($codechat)
    {
        $this->db->where('code_chatroom', $codechat);
        $this->db->order_by('datetime', 'ASC');
        $query = $this->db->get('message');

        foreach($query->result_array() as $data)
          { ?>
                    <div class="message" style="padding: 30px; border-bottom: 1px solid #adb5bd;">
                            <div class="message-Hader mb-1" style="display: -webkit-flex;">
                                <div class="avatar" style="margin-right: 15px;">
                                    <i class="fa fa-circle-08">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </i>
                                </div>
                                <div class="question-item__header-center" style="-webkit-flex: 1;
                                                                                -ms-flex: 1;
                                                                                /* flex: 1; */
                                                                                /* width: 50%; */
                                                                                /* overflow: hidden; */">
                                    <div class="question-item__author truncate">
                                        <p style="margin-bottom: 0px; font-weight: 600; font-size: 18px;">Anonymous</p>
                                    </div>
                                    <div class="question-item__date"><p style="font-size: 14px;"><?php echo $data['datetime'] ?> </p></div>
                            </div>
                            <div class="question-item_like" style="align:right">
                                    <button class="btn btn-icon btn-3 btn" type="button" style="background-color: #2181c2; color: #fff;">
                                        <span class="Count-like">1</span>
                                        <span class="btn-inner--icon"><i class="ni ni-like-2"></i>
                                        </span>
                                        <span class="btn-inner--text">Like</span>  
                                    </button>
                            </div>
                            </div>
                            <div class="question-item_Body" style="word-wrap: break-word;   overflow-wrap: break-word;  overflow: hidden;">
                                    <span><?php echo $data['message'] ?></span>
                            </div>
                    </div>

    <?php } 
    }
    
    public function IncreaseChatRecent($codechat)
    {
        $this->db->where('code_chatroom', $codechat);
        $this->db->order_by('datetime', 'Desc');
        $query = $this->db->get('message',1);

        foreach($query->result_array() as $data)
          { ?>
                    <div class="message" style="padding: 30px; border-bottom: 1px solid #adb5bd;">
                            <div class="message-Hader mb-1" style="display: -webkit-flex;">
                                <div class="avatar" style="margin-right: 15px;">
                                    <i class="fa fa-circle-08">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </i>
                                </div>
                                <div class="question-item__header-center" style="-webkit-flex: 1;
                                                                                -ms-flex: 1;
                                                                                /* flex: 1; */
                                                                                /* width: 50%; */
                                                                                /* overflow: hidden; */">
                                    <div class="question-item__author truncate">
                                        <p style="margin-bottom: 0px; font-weight: 600; font-size: 18px;">Anonymous</p>
                                    </div>
                                    <div class="question-item__date"><p style="font-size: 14px;"><?php echo $data['datetime'] ?> </p></div>
                            </div>
                            <div class="question-item_like" style="align:right">
                                    <button class="btn btn-icon btn-3 btn" type="button" style="background-color: #2181c2; color: #fff;">
                                        <span class="Count-like">1</span>
                                        <span class="btn-inner--icon"><i class="ni ni-like-2"></i>
                                        </span>
                                        <span class="btn-inner--text">Like</span>  
                                    </button>
                            </div>
                            </div>
                            <div class="question-item_Body" style="word-wrap: break-word;   overflow-wrap: break-word;  overflow: hidden;">
                                    <span><?php echo $data['message'] ?></span>
                            </div>
                    </div>

    <?php } 
    }
    
    

}

/* End of file AdminChatroomController.php */
