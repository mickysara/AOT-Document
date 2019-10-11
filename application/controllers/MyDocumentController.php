<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MyDocumentController extends CI_Controller {

    public function index()
    {
        if($this->session->userdata("_success") == "")
        {
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('AlertController/loginalert');
        }
        else
        {
            $this->load->view('Header');
            $this->load->view('MyDoc');
            $this->load->view('Footer');
        }

        
    }
    public function myupload()
    {

        $this->db->where('Uploadby', $this->session->userdata('accountName'));
        $this->db->where('Status','ใช้งาน');
        $result = $this->db->get('Upload');
            
        if($result->num_rows() == 0)
        {?>
            <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">เอกสารที่อัปโหลด</h2>
                    <hr>
                    <a href="<?php echo site_url(); ?>UploadController/"  class="btn btn-success mb-3" style="">อัปโหลดเอกสาร</a>         
                    <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มี เอกสารที่คุณอัปโหลด</h2>
                </div>
            </div>
        <?php 
        }else{
        ?>
        
        <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">เอกสารที่อัปโหลด</h2>
                    <hr>
                    <div class="table-responsive">
                    <a href="<?php echo site_url(); ?>UploadController/Mydoc"  class="btn btn-success mb-3" style="">อัปโหลดเอกสาร</a>     
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>ชื่อหัวข้อ</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เมื่อวันที่</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> สถานะ </h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> ความเป็นส่วนตัว </h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เพิ่มเติม</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">Edit</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">Delete</h4></th>
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
                                                    <img src="<?php echo base_url().'assets/img/logofile/'. $data['Type']?>.png" alt="">
                                                    </a>
                                                    <div class="media-body">
                                                    <span class="mb-0 text-sm"><?php echo $data['Topic'];?></span>
                                                    </div>
                                                </div>
                                                </th>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                     <?php echo date('d/m/Y', strtotime($data['Date']));?>
                                                </span>
                                                </td>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-success"></i> <?php echo $data['Status'];?>
                                                </span>
                                                </td>   
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-success"></i> <?php echo $data['Privacy'];?>
                                                </span>
                                                </td> 
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                <a href="<?php echo site_url(); ?>DetailDocController/edit/<?php echo  $data['Id_Upload'];?>"  class="btn btn mb-3" style="background-color: #2d3436; color: #fff;">View</a>              
                                                </span>
                                                </td>  
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                <a href="<?php echo site_url(); ?>EditDocumentController/checkaccount/<?php echo $data['Id_Upload'];?>"class="btn btn-primary mb-3">Edit</a>              
                                                </span>
                                                </td>  
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                <a href="<?php echo site_url(); ?>/ViewController/delfile/<?php echo $data['Id_Upload'];?>" onclick="return confirm('คุณต้องการลบไฟล์นี้ใช่หรือไม่ ?')" class="btn btn-danger mb-3">Delete</a>           
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
        $this->db->where('Createby', $this->session->userdata('accountName'));
        $result = $this->db->get('Repository');
        if($result->num_rows() == 0)
        {?>
            <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">ทีมของคุณ</h2>
                    <hr>
                    <a href="<?php echo site_url(); ?>RepoController/"  class="btn btn-success mb-3" style="">สร้างทีม</a>        
                    <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มีทีมของคุณ</h2>
                </div>
            </div>
        <?php 
        }else{
        ?>
        <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">ทีมของคุณ</h2>
                    <hr>
                    <div class="table-responsive">
                    <a href="<?php echo site_url(); ?>RepoController/"  class="btn btn-success mb-3" style="">สร้างทีม</a>               
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>ชื่อทีม</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เมื่อวันที่</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ดู</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> แก้ไข </h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ลบ</h4></th>
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
                                                    <span class="mb-0 text-sm"><?php echo $data['Topic'];?></span>
                                                    </div>
                                                </div>
                                                </th>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                     <?php echo date('d/m/Y', strtotime($data['Date']));?>
                                                </span>
                                                </td>
                                                  
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                <a href="<?php echo site_url(); ?>repositoryController/showdata/<?php echo  $data['Id_Repository'];?>"  class="btn btn mb-3" style="background-color: #2d3436; color: #fff;">View</a>              
                                                </span>
                                                </td>  
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                <a href="<?php echo site_url(); ?>EditRepositoryController/edit/<?php echo  $data['Id_Repository'];?>"  class="btn btn-primary mb-3" >Edit</a>              
                                                </span>
                                                </td>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                <a href="<?php echo site_url(); ?>EditRepositoryController/delrepo/<?php echo  $data['Id_Repository'];?>" onclick="return confirm('คุณต้องการลบทีมนี้ใช่หรือไม่ ?')"  class="btn btn-danger mb-3">Delete</a>              
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
        $query=$this->db->query("SELECT  Repository.* ,Repository_Member.Level , Repository_Member.AddBy
                                FROM  Repository,Repository_Member
                                WHERE Repository.Id_Repository = Repository_Member.Id_Repository 
                                AND Repository_Member.AccName = '$accname' ");
        
        if($query->num_rows() == 0)
        {?>
            <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">ทีมที่คุณเข้าร่วม</h2>
                    <hr>
                    <a href="<?php echo site_url(); ?>RepoController/"  class="btn btn-success mb-3" style="">สร้างทีม</a>        
                    <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">คุณไม่ได้ถูกเชิญให้เข้าทีมในตอนนี้</h2>
                </div>
            </div>
        <?php 
        }else{
        ?>
        <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">ทีมที่คุณเข้าร่วม</h2>
                    <hr>
                    <div class="table-responsive">
                    <a href="<?php echo site_url(); ?>RepoController/"  class="btn btn-success mb-3" style="">สร้างทีม</a>               
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>ชื่อทีม</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เมื่อวันที่</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> ความเป็นส่วนตัว </h4></th>                                          
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> เพิ่มโดย </h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">View</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">Edit</h4></th>
                                                <!-- <th style="text-align:center;" scope="col"><h4 style="text-align: left;">Delete</h4></th> -->
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
                                                    <span class="mb-0 text-sm"><?php echo $data['Topic'];?></span>
                                                    </div>
                                                </div>
                                                </th>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                     <?php echo date('d/m/Y', strtotime($data['Date']));?>
                                                </span>
                                                </td>
                                                 
                                                <td>
                                                 <?php echo $data['Level'];?>
                                                </td> 
                                                <td>
                                                 <?php echo $data['AddBy'];?>
                                                </td>
                                                             
                                        <td>
                                        <span class="badge badge-dot mr-4">
                                        <a href="<?php echo site_url(); ?>repositoryController/showdata/<?php echo  $data['Id_Repository'];?>"  class="btn btn mb-3" style="background-color: #2d3436; color: #fff;">View</a>              
                                        </span>
                                        </td>  
                                        




                                        <?php if($data['Level'] == 'Viewer' || $data['Level'] == 'Editor')
                                        {?>
                                        <td>
                                        <span class="badge badge-dot mr-4">        
                                        </span>
                                        </td>
                                       
                                        <?php }else if($data['Level'] == 'Manager'){ ?>

                                        <td>
                                        <span class="badge badge-dot mr-4">
                                        <a href="<?php echo site_url(); ?>EditRepositoryController/edit/<?php echo  $data['Id_Repository'];?>"  class="btn btn-primary mb-3" >Edit</a>              
                                        </span>
                                        </td>
                                        <!-- <td>
                                        <span class="badge badge-dot mr-4">
                                        <a href="<?php echo site_url(); ?>EditRepositoryController/delrepo/<?php echo  $data['Id_Repository'];?>"  class="btn btn-danger mb-3" >Delete</a>              
                                        </span>
                                        </td> -->

                                        <?php }else{ ?> 


                                            <?php } ?> 








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
