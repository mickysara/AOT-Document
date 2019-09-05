<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MyDocumentController extends CI_Controller {

    public function index()
    {

        $this->load->view('Header');
        $this->load->view('MyDoc');
        $this->load->view('Footer');
        
    }
    public function myupload()
    {

        $this->db->where('name', $this->session->userdata('accountName'));
        $result = $this->db->get('upload');
            
        if($result->num_rows() == 0)
        {?>
            <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">Repository ของคุณ</h2>
                    <hr>
                    <a href="<?php echo site_url(); ?>RepoController/"  class="btn btn-success mb-3" style="">สร้าง Repositoy</a>        
                    <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มี Repository ของคุณ</h2>
                </div>
            </div>
        <?php 
        }else{
        ?>
        
        <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">เอกสารที่อัพโหลด</h2>
                    <hr>
                    <div class="table-responsive">
                    <a href="<?php echo site_url(); ?>UploadController/"  class="btn btn-success mb-3" style="">อัปโหลดเอกสาร</a>     
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>ชื่อไฟล์</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เมื่อวันที่</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> สถานะ </h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เพิ่มเติม</h4></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php                 
                                                foreach($result->result_array() as $data)
                                                {?>
                                            <tr>
                                                <th scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3">
                                                    <img src="<?php echo base_url().'assets/img/logofile/'. $data['type']?>.png" alt="">
                                                    </a>
                                                    <div class="media-body">
                                                    <span class="mb-0 text-sm"><?php echo $data['file'];?></span>
                                                    </div>
                                                </div>
                                                </th>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                     <?php echo date('d/m/Y', strtotime($data['date']));?>
                                                </span>
                                                </td>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-success"></i> <?php echo $data['status'];?>
                                                </span>
                                                </td>   
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                <a href="<?php echo site_url(); ?>DetailDocController/edit/<?php echo  $data['id_upload'];?>"  class="btn btn mb-3" style="background-color: #2d3436; color: #fff;">View</a>              
                                
                                                </span>
                                                </td>  
                                            </tr>
                                            <?php } ?> 
                                            </tbody>
                                        </table>
                                        </div>
    </div>

        <?php
        }
    }

    public function MyRepository()
    {
        $this->db->where('createby', $this->session->userdata('accountName'));
        $result = $this->db->get('repository');
        if($result->num_rows() == 0)
        {?>
            <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">Repository ของคุณ</h2>
                    <hr>
                    <a href="<?php echo site_url(); ?>RepoController/"  class="btn btn-success mb-3" style="">สร้าง Repositoy</a>        
                    <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มี Repository ของคุณ</h2>
                </div>
            </div>
        <?php 
        }else{
        ?>
        <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">Repository ของคุณ</h2>
                    <hr>
                    <div class="table-responsive">
                    <a href="<?php echo site_url(); ?>RepoController/"  class="btn btn-success mb-3" style="">สร้าง Repositoy</a>               
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>ชื่อ Repository</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เมื่อวันที่</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> ความเป็นส่วนตัว </h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เพิ่มเติม</h4></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php                 
                                                foreach($result->result_array() as $data)
                                                {?>
                                            <tr>
                                                <th scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="media-body">
                                                    <span class="mb-0 text-sm"><?php echo $data['topic'];?></span>
                                                    </div>
                                                </div>
                                                </th>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                     <?php echo date('d/m/Y', strtotime($data['date']));?>
                                                </span>
                                                </td>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-success"></i> <?php echo $data['privacy'];?>
                                                </span>
                                                </td>   
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                <a href="<?php echo site_url(); ?>RepositoryController/showdata/<?php echo  $data['id'];?>"  class="btn btn mb-3" style="background-color: #2d3436; color: #fff;">View</a>              
                                
                                                </span>
                                                </td>  
                                            </tr>
                                            <?php } ?> 
                                            </tbody>
                                        </table>
                                        </div>
    </div>
    <?php 
        } 
    }
    public function InRepository()
    {
        $accname = $this->session->userdata('accountName');
        $query=$this->db->query("SELECT  repository.* ,repository_member.level , repository_member.addBy
                                FROM  repository,repository_member
                                WHERE repository.id = repository_member.id_repository 
                                AND repository_member.accname = '$accname' ");
        
        if($query->num_rows() == 0)
        {?>
            <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">Repository ของคุณ</h2>
                    <hr>
                    <a href="<?php echo site_url(); ?>RepoController/"  class="btn btn-success mb-3" style="">สร้าง Repositoy</a>        
                    <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มี Repository ของคุณ</h2>
                </div>
            </div>
        <?php 
        }else{
        ?>
        <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">Repository ของคุณ</h2>
                    <hr>
                    <div class="table-responsive">
                    <a href="<?php echo site_url(); ?>RepoController/"  class="btn btn-success mb-3" style="">สร้าง Repositoy</a>               
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>ชื่อ Repository</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เมื่อวันที่</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> ความเป็นส่วนตัว </h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> ระดับใน Repository </h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> เพิ่มโดย </h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เพิ่มเติม</h4></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php                 
                                                foreach($query->result_array() as $data)
                                                {?>
                                            <tr>
                                                <th scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="media-body">
                                                    <span class="mb-0 text-sm"><?php echo $data['topic'];?></span>
                                                    </div>
                                                </div>
                                                </th>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                     <?php echo date('d/m/Y', strtotime($data['date']));?>
                                                </span>
                                                </td>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-success"></i> <?php echo $data['privacy'];?>
                                                </span>
                                                </td>   
                                                <td>
                                                 <?php echo $data['level'];?>
                                                </td> 
                                                <td>
                                                 <?php echo $data['addBy'];?>
                                                </td>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                <a href="<?php echo site_url(); ?>RepositoryController/showdata/<?php echo  $data['id'];?>"  class="btn btn mb-3" style="background-color: #2d3436; color: #fff;">View</a>              
                                
                                                </span>
                                                </td>  
                                            </tr>
                                            <?php } ?> 
                                            </tbody>
                                        </table>
                                        </div>
    </div>
    <?php 
        } 
    }

}

/* End of file MyDocumentController.php */