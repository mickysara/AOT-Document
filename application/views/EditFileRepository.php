<!DOCTYPE html>
<html lang="en">
 <head>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  </head>
  <body>
 
                <?php          
                    if(isset($edit_data) && is_array($edit_data) && count($edit_data)): $i=1;
                    foreach ($edit_data as $key => $data) {   
                ?>
   <div class="container" style="margin-top: 60px;">
    <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <div class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            
            <form method="post" id="upload_form" action="<?php echo site_url('EditController/editdatarepo');?>" enctype='multipart/form-data'>
                <h1 class="display-2" style="color:#2d3436;">แก้ไขไฟล์</h1>
                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>ชื่อ</div>
                      <input type="Text" class="form-control form-control-alternative" name="name" value="<?php echo $data['Uploadby'];?>" required id="name" readonly>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                    <div>หัวข้อ</div>
                    <input type="text" class="form-control form-control-alternative" id="topic" value="<?php echo $data['Topic'];?>" name="topic" placeholder="topic" required>
                    </div>

                    <div class="form-group">
                    <!-- <div class="form-group">
                    <td>ไฟล์</td>
                    <div class="custom-file mb-3">
                      <input type="file" class="custom-file-input" required id="image_file" name="userfile[]" accept=".png,.jpg,.jpeg,.gif,.pdf,.pptx,.docx,.xlsx">
                      <label class="custom-file-label">กรุณาเลือกไฟล์</label>
                    </div>
                    </div> -->
              
                    <div class="form-group">
                    <div>ไฟล์</div>
                      <input type="Text" class="form-control form-control-alternative" name="imagefile" value="<?php echo $data['File'];?>" id="imagefile" readonly>
                    </div>
          
                    <div class="form-group">
                    <div>ใช้วันที่</div>
                    <input type="text" class="form-control form-control-alternative" id="date" value="<?php echo $data['Date'];?>" name="date" required readonly>
                    </div>
                    <?php if(date('d/m/Y', strtotime($data['Dateend'])) ==  '01/01/1970'){
                      $dateshow = '';
                      }else{
                        $dateshow = date('d/m/Y', strtotime($data['Dateend']));
                      }?>
                    <div class="form-group">
                    <div>ถึงวันที่</div>
                    <input class="form-control datepicker" id="date_end" name="date_end" placeholder="Select date" type="text" value="<?php echo $dateshow; ?>"  autocomplete="off">
                    </div>

                    <div class="form-group">
                    <div>รายละเอียด</div>
                    <textarea class="form-control form-control-alternative" rows="4" id="detail" name="detail" required><?php echo $data['Detail'];?></textarea>
                    </div>


                    <input type="hidden" name="Id_UploadInRepository" value= <?php echo $data['Id_UploadInRepository'];?>>
                  <button type="Submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" value="Submit">บันทึกการแก้ไข</button>
                  

              
                <?php } endif; ?>
            </form>

            
                                <script> 
                            var uploadField = document.getElementById("image_file");

                            uploadField.onchange = function() {
                                if(this.files[0].size > 10000000){  //ขนาดไฟล์ไม่เกิน 10 mb คิดตามจำนวน byte 10ล้าน เท่ากับ 10 mb
                                  swal({
                                      title: "Upload Fail",
                                      text: "ไฟล์ของคุณมีขนาดใหญ่กว่า 10 MB",
                                      icon: "error", 
                                    }); 
                                  this.value = "";
                                  
                                };
                               };
                                </script> 


                         <script type="text/javascript">
                            function privacyalert(){
                              var file = $("#image_file").val();
                              var privacy = $("#privacy").val();
                            
                            if(privacy ==""||file ==""){
                                alert("กรุณากรอกข้อมูลให้ครบ");
                            }else{
                              swal({
                                    title: "Upload Success",
                                    text: "กรุณาคลิกปุ่ม OK เพื่อไปยังหน้าถัดไป",
                                    icon: "success", 
                                    
                                  }); 
                          }
                            }

                            </script> 
                                       
                        <script>
                        // Add the following code if you want the name of the file appear on select
                        $(".custom-file-input").on("change", function() {
                          var fileName = $(this).val().split("\\").pop();
                          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                        });
                        </script>
      </body>
            </div>
            </div>
</div>
