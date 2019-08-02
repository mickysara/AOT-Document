<!DOCTYPE html>
<html lang="en">
 <head>
  </head>
  <body>
 
                <?php          
                    if(isset($edit_data) && is_array($edit_data) && count($edit_data)): $i=1;
                    foreach ($edit_data as $key => $data) {   
                ?>
    <div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <div class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            
            <form method="post" id="upload_form" action="<?php echo site_url('EditController/editdata');?>" enctype='multipart/form-data'>
                <h1 class="display-2" style="color:#2d3436;">แก้ไขไฟล์</h1>
                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>ชื่อ</div>
                      <input type="Text" class="form-control form-control-alternative" name="name" value="<?php echo $data['name'];?>" required id="name" readonly>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                    <div>หัวข้อ</div>
                    <input type="text" class="form-control form-control-alternative" id="topic" value="<?php echo $data['topic'];?>" name="topic" placeholder="topic" required>
                    </div>

                    <div class="form-group">
                    <tr>
                    <td>ไฟล์</td>
                    <td><input type="file" name="userfile[]" required id="image_file" accept=".png,.jpg,.jpeg,.gif,.pdf,.pptx,.docx,.xlsx"></td>
                    </tr>
                    </div>

                    <div class="form-group">
                    <div>ใช้วันที่</div>
                    <input type="text" class="form-control form-control-alternative" id="date" value="<?php echo $data['date'];?>" name="date" value="<?php echo"".date("d/m/Y") ?>" required readonly>
                    </div>

                    <div class="form-group">
                    <div>ถึงวันที่</div>
                    <input class="form-control datepicker" id="date_end" name="date_end" placeholder="Select date" type="text" value="<?php echo"".date("d/m/Y") ?>"  required>
                    </div>

                    <div class="form-group">
                    <div>รายละเอียด</div>
                    <textarea class="form-control form-control-alternative" rows="4" id="detail" name="detail" required><?php echo $data['detail'];?></textarea>
                    </div>

                    <div class="form-group">
                    <div>ระดับความเป็นส่วนตัว</div>
                    <select name="privacy" id="privacy">
                      <option value="" disabled selected>กรุณาเลือกระดับความเป็นส่วนตัวของไฟล์</option>
                      <option value="Private">ส่วนตัว</option>
                      <option value="Authen">เฉพาะที่ผู้ที่มีรหัส</option>
                      <option value="Public">สาธารณะ</option>
                    </select>
                    </div>

                    <input type="hidden" name="id_upload" value= <?php echo $data['id_upload'];?>>
                  <button type="Submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" value="Submit">บันทึกการแก้ไข</button>

                <a href="<?php echo site_url("/ViewController");?>" class="btn btn-primary btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;">ย้อนกลับ</a>
                <?php } endif; ?>
            </form>

            
                                <script> 
                            var uploadField = document.getElementById("image_file");

                            uploadField.onchange = function() {
                                if(this.files[0].size > 2000000){  //ขนาดไฟล์ไม่เกิน 10 mb คิดตามจำนวน byte 10ล้าน เท่ากับ 10 mb
                                  swal({
                                      title: "Upload Fail",
                                      text: "ไฟล์ของคุณมีขนาดใหญ่กว่า 10 MB",
                                      icon: "error", 
                                    }); 
                                  this.value = "";
                                  
                                };
                               };
                                </script> 

                                       
                                        
      </body>
            </div>
</div>
