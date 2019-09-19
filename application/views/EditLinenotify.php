<body>
<div class="container" style="margin-top: 60px;">
<div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">
              <?php          
                    if(isset($edit_data) && is_array($edit_data) && count($edit_data)): $i=1;
                    foreach ($edit_data as $key => $data) {   
                ?>
            <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form name="notify" id="editnotify_form" action="<?php echo site_url('EditLineNotifyController/editdata');?>" method="post">
                <h1 class="display-2">แจ้งปัญหา</h1>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>แจ้งปัญหา</div>
                        <textarea class="form-control form-control-alternative" rows="3" id="probem" name="probem" required readonly><?php echo $data['Detail'];?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>ชื่อ - นามสกุล</div>
                    <input type="text" class="form-control form-control-alternative" id="Name" name="Name" value = "<?php echo $data['AccName'];?>" required readonly>
                    </div>
                    <div class="form-group">
                    <div>E-mail</div>
                    <input type="email" class="form-control form-control-alternative" id="email" name="email" value="<?php echo $data['Email'];?>" required readonly>
                    </div>
                    <div>เบอร์ติดต่อ</div>
                    <input type="text" class="form-control form-control-alternative" id="tel" name="tel" value="<?php echo $data['Tel'];?>"required readonly>
                    </div>
                  </div>
                </div>
                <br>
                
                
                <div class="form-group">
                    <div>สถานะของปัญหา</div>
                    <select  name="status" id="status" required>
                      <option value="" disabled selected>กรุณาเลือกสถานะการแก้ไข</option>
                      <option value="ยังไม่ได้รับการแก้ไข">ยังไม่ได้รับการแก้ไข</option>
                      <option value="แก้ไขแล้ว">แก้ไขแล้ว</option>
                      
                    </select>
                    </div>

                    <input type="hidden" name="id_linenoti" value= <?php echo $data['Id_Problem'];?>>
                    <button  type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" value="Submit">แก้ไขสถานะ</button>
                    <a href="<?php echo site_url("/ViewLineNotifyController");?>" class="btn btn-primary btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;">ย้อนกลับ</a>
            </form>
            </div>
            </div>
            <?php } endif; ?>

            <script type="text/javascript">
                  function sweetalertclick(){
                    swal({
                          title: "แก้ไขสถานะเรียบร้อย",
                          text: "กรุณาคลิกปุ่ม OK เพื่อไปยังหน้าถัดไป",
                          icon: "success"
                        }
                      ); 
                  }
                  </script> 


              <script type="text/javascript">
                var status = $("#status").val();
                  function checkstatus(){
                    alert("ยืนยันการแก้ไขสถานะ");

                  }
                  </script> 
</div>
</div>
