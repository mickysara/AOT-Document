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
        $this->db->select('message.message,message.id,message.datetime, count(like_message.id) as number_of_like');
        $this->db->from('message');
        $this->db->where('code_chatroom', $codechat);
        $this->db->join('like_message', '(message.id = like_message.id_message)', 'left');
        $this->db->group_by('message.id');
        $this->db->order_by('datetime', 'asc');
        $query = $this->db->get();

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
                                    <div class="question-item__date"><p style="font-size: 14px;"><?php echo date('d/m/Y h:i', strtotime($data['datetime']));?> </p></div>
                            </div>
                            <div class="question-item_like" style="align:right">

                                <?php   $this->db->where('likeby', $this->session->userdata('employeeId'));
                                        $this->db->where('id_message', $data['id']);
                                        $q  = $this->db->get('like_message', 1);
                                        if($q->num_rows() == 0)
                                        {?>
                                        
                                        <a id="like" class="btn btn-outline-primary" value="<?php echo $data['id'] ?>" href="#" style="">
                                                <span class="Count-like"><?php echo $data['number_of_like']?></span>
                                                <span class="btn-inner--icon"><i class="ni ni-like-2"></i>
                                                </span>
                                                <span class="btn-inner--text">ถูกใจ</span>  
                                            </a>
                                <?php   }else{ ?>
                                            <a id="dislike" class="btn btn-icon btn-3 btn" value="<?php echo $data['id'] ?>" href="#" style="background-color: #2181c2; color: #fff;">
                                            <span class="Count-like"><?php echo $data['number_of_like']?></span>
                                            <span class="btn-inner--icon"><i class="ni ni-like-2"></i>
                                            </span>
                                            <span class="btn-inner--text">เลิกถูกใจ</span>  
                                            </a>
                                <?php   } ?>
                                
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
        $this->db->select('message.message,message.id,message.datetime, count(like_message.id) as number_of_like');
        $this->db->from('message');
        $this->db->where('code_chatroom', $codechat);
        $this->db->join('like_message', '(message.id = like_message.id_message)', 'left');
        $this->db->group_by('message.id');
        $this->db->order_by('datetime', 'DESC');
        $query = $this->db->get("",1);

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
                                    <div class="question-item__date"><p style="font-size: 14px;"><?php echo date('d/m/Y h:i', strtotime($data['datetime']));?> </p></div>
                            </div>
                            <div class="question-item_like" style="align:right">
                            <?php   $this->db->where('likeby', $this->session->userdata('employeeId'));
                                        $this->db->where('id_message', $data['id']);
                                        $q  = $this->db->get('like_message', 1);
                                        if($q->num_rows() == 0)
                                        {?>
                                        
                                        <a id="like" class="btn btn-outline-primary" value="<?php echo $data['id'] ?>" href="#" style="">
                                                <span class="Count-like"><?php echo $data['number_of_like']?></span>
                                                <span class="btn-inner--icon"><i class="ni ni-like-2"></i>
                                                </span>
                                                <span class="btn-inner--text">ถูกใจ</span>  
                                            </a>
                                <?php   }else{ ?>
                                            <a id="dislike" class="btn btn-icon btn-3 btn" value="<?php echo $data['id'] ?>" href="#" style="background-color: #2181c2; color: #fff;">
                                            <span class="Count-like"><?php echo $data['number_of_like']?></span>
                                            <span class="btn-inner--icon"><i class="ni ni-like-2"></i>
                                            </span>
                                            <span class="btn-inner--text">เลิกถูกใจ</span>  
                                            </a>
                                <?php   } ?>
                            </div>
                            </div>
                            <div class="question-item_Body" style="word-wrap: break-word;   overflow-wrap: break-word;  overflow: hidden;">
                                    <span><?php echo $data['message'] ?></span>
                            </div>
                    </div>
                    

    <?php } 
    }
    public function IncreaseChatPopular($codechat)
    {
        $this->db->select('message.message,message.id,message.datetime, count(like_message.id) as number_of_like');
        $this->db->from('message');
        $this->db->where('code_chatroom', $codechat);
        $this->db->join('like_message', '(message.id = like_message.id_message)', 'left');
        $this->db->group_by('message.id');
        $this->db->order_by('number_of_like', 'DESC');
        $query = $this->db->get();
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
                                  <div class="question-item__date"><p style="font-size: 14px;"><?php echo date('d/m/Y h:i', strtotime($data['datetime']));?> </p></div>
                          </div>
                          <div class="question-item_like" style="align:right">
                          <?php   $this->db->where('likeby', $this->session->userdata('employeeId'));
                                        $this->db->where('id_message', $data['id']);
                                        $q  = $this->db->get('like_message', 1);
                                        if($q->num_rows() == 0)
                                        {?>
                                        
                                        <a id="like" class="btn btn-outline-primary" value="<?php echo $data['id'] ?>" href="#" style="">
                                                <span class="Count-like"><?php echo $data['number_of_like']?></span>
                                                <span class="btn-inner--icon"><i class="ni ni-like-2"></i>
                                                </span>
                                                <span class="btn-inner--text">ถูกใจ</span>  
                                            </a>
                                <?php   }else{ ?>
                                            <a id="dislike" class="btn btn-icon btn-3 btn" value="<?php echo $data['id'] ?>" href="#" style="background-color: #2181c2; color: #fff;">
                                            <span class="Count-like"><?php echo $data['number_of_like']?></span>
                                            <span class="btn-inner--icon"><i class="ni ni-like-2"></i>
                                            </span>
                                            <span class="btn-inner--text">เลิกถูกใจ</span>  
                                            </a>
                                <?php   } ?>
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
