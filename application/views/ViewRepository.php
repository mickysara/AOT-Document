<?php 
        $result = $this->db->get('repository');
        ?>
        <div class="container">
        <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">Repository</h2>
                    <hr>
                    <div class="table-responsive">
                    <a href="<?php echo site_url(); ?>RepoController/"  class="btn btn-success mb-3" style="">สร้าง Repositoy</a>               
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>ชื่อ Repository</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เมื่อวันที่</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> ความเป็นส่วนตัว </h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">View</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">Deleate</h4></th>
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
                                                <td>
                                                    <span class="badge badge-dot mr-4">
                                                    <a href="<?php echo site_url(); ?>RepositoryController/showdata/<?php echo  $data['id'];?>"  class="btn btn-danger mb-3" style="color: #fff;">Deleate</a>              
                                                    </span>
                                                </td>   
                                            </tr>
                                            <?php } ?> 
                                            </tbody>
                                        </table>
                                        </div>
    </div>
    </div>