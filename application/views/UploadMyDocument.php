<!DOCTYPE html>
<html lang="en">
 <head>
  </head>
  <body>
  <!-- action="<?php echo site_url('UploadController/UploadMydocument');?>" -->
    <div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <div class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form method="post" id="upload_form" action="<?php echo site_url('UploadController/UploadMydocument');?>" enctype='multipart/form-data'>
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
                    <div class="custom-file mb-3">
                      <input type="file" class="custom-file-input" required id="image_file" name="userfile[]" accept=".png,.jpg,.jpeg,.gif,.pdf,.pptx,.docx,.xlsx">
                      <label class="custom-file-label">กรุณาเลือกไฟล์</label>
                    </div>
                    </div>
                    <div id="progress" class="progress mb-4"style="height: 20px">
                    <div id="progress-bar-fill" class="progress-bar-fill bg-primary " role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              
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
                <button type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" value="Submit">ยืนยัน</button>
            </form>


              <!-- <script type="text/javascript">
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

                  </script>  -->
            
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

                        <script>
                        // Add the following code if you want the name of the file appear on select
                        $(".custom-file-input").on("change", function() {
                          var fileName = $(this).val().split("\\").pop();
                          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                        });
                        </script>
           



                                               <!----------------- progress bar upload ------------------------->
                                               <!-- <script>
            $(document).ready(function() {

            $('form').on('submit', function(event) {

              event.preventDefault();

              var formData = new FormData($('form')[0]);

              $.ajax({
                xhr : function() {
                  var xhr = new window.XMLHttpRequest();

                  xhr.upload.addEventListener('progress', function(e) {

                    if (e.lengthComputable) {

                      console.log('Bytes Loaded: ' + e.loaded);
                      console.log('Total Size: ' + e.total);
                      console.log('Percentage Uploaded: ' + (e.loaded / e.total))

                      var percent = Math.round((e.loaded / e.total) * 100);

                      $('#progress-bar-fill').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');

                    }

                  });

                  return xhr;
                },
                type : 'POST',
                url : '/IndexController',
                data : formData,
                processData : false,
                contentType : false,
                success : function() {
                  alert("Upload Success");
                  location.href = '<?=base_url('/UploadController/UploadMydocument')?>'
                }
              });

            });

            }); -->
            </script> 
      </body>
            </div>
</div>