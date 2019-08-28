<!DOCTYPE html>
<html lang="en">
 <head>
  </head>
  <body>
    
    <div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <?php $repostrnono = base_url(uri_string());
             $arraystate2 = (explode("/",$repostrnono));
             $idRepo = ($arraystate2[6]);?>
            <div class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form method="post" id="upload_form" action="<?php echo site_url('UploadFileRepoController/file_upload/').$idRepo;?>" enctype='multipart/form-data'>
                <h1 class="display-2" style="color:#2d3436;">อัพโหลดไฟล์</h1>
                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>ชื่อ</div>
                      <input type="Text" class="form-control form-control-alternative" name="name" value="<?=$this->session->userdata('accountName')?>" required id="name" readonly>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                    <div>หัวข้อ</div>
                    <input type="text" class="form-control form-control-alternative" id="topic" name="topic" placeholder="topic" required>
                    </div>

                    <div class="form-group">
                    <td>ไฟล์</td>
                      <input type="file" required id="image_file" name="userfile[]" accept=".png,.jpg,.jpeg,.gif,.pdf,.pptx,.docx,.xlsx">
                    </div>
                 

                    <div class="form-group">
                    <div>ใช้วันที่</div>
                    <input type="text" class="form-control form-control-alternative" id="date" name="date" value="<?php echo"".date("d/m/Y") ?>" required readonly>
                    </div>

                    <div class="form-group">
                    <div>ถึงวันที่</div>
                    <input class="form-control datepicker" id="date_end" name="date_end" placeholder="Select date" type="text" autocomplete="off" value="">
                    </div>

                    <div class="form-group">
                    <div>รายละเอียด</div>
                    <textarea class="form-control form-control-alternative" rows="4" id="detail" name="detail"  placeholder="Write a large text here ..." required></textarea>
                    </div>

                    <div class="form-group">
                    <div>ระดับความเป็นส่วนตัว</div>
                    <select name="privacy" id="privacy" required>
                      <option value="Public">สาธารณะ</option>
                      <option value="Private">ส่วนตัว</option>
                      <option value="Authen">เฉพาะที่ผู้ที่มีรหัส</option>
                    </select>
                    </div>

                    <script>
            </script>
                <button onclick="javascript:sweetalertclick()" type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" value="Submit">ยืนยัน</button>
            </form>


              <script type="text/javascript">
                  function sweetalertclick(){
                var name = $("#name").val();
                var topic = $("#topic").val();
                var file = $("#image_file").val();
                var date = $("#date").val();
                var dateend = $("#date_end").val();
                var detail = $("#detail").val();
                var privacy = $("#privacy").val();
                  
                  if(topic ==""|| file ==""|| detail ==""||privacy ==""){
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
