<div class="container"  style="">
<?php
        $result = $this->db->get('Logs');
            
        if($result->num_rows() == 0)
        {?>
            <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">Logs</h2>
                    <hr>      
                    <h2 style=" text-align: center; margin-left: auto; margin-right: auto;">ไม่มีLog ในตอนนี้</h2>
                </div>
            </div>
        <?php 
        }else{
        ?>
        
        <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
                border-radius: .25rem;
                background-color: #f7f8f9;">

                <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
                    <h2 class="" style="font-size: 30px;">Logs</h2>
                    <hr>
                    <div class="table-responsive">  
                    <a href="<?php echo site_url(); ?>LogController/del/" onclick="return confirm('คุณต้องการลบ Log ใช่หรือไม่ ?')" class="btn btn-success mb-3" style="text-align: right;">ลบข้อมูล Log</a>
                                        <table class="table align-items-center table-flush" id="Log">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>วันที่และเวลา</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">รหัสพนักงาน</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">IP</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;"> Action </h4></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php                 
                                                foreach($result->result_array() as $data)
                                                {?>
                                            <tr>
                                                <th scope="row">
                                                    <?php echo date('d/m/Y H:i:s ', strtotime($data['TimeStamp'])); ?>
                                                </th>
                                                <td>
                                                    <?php echo $data['Id_Emp'];?>
                                                </td>
                                                <td>
                                                    <?php echo $data['Ip'];?>
                                                </td>   
                                                <td>
                                                    <?php echo $data['Action'];?>
                                                </td> 
                                            </tr>
                                            <?php } 
                                            }?> 
                                            </tbody>
                                        </table>
                                        </div>
    </div>
</div>