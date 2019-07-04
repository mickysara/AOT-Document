  
  <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
  <!-- Core -->
  <script src="<?php echo base_url('/assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/popper/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/bootstrap/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/headroom/headroom.min.js'); ?>"></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url('/assets/vendor/onscreen/onscreen.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/nouislider/js/nouislider.min.js'); ?>"></script>
    <!-- DatePicker -->

    <script src="<?php echo base_url('/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
  
  <!-- Argon JS -->
  <script src="<?php echo base_url('/assets/js/argon.js?v=1.0.1'); ?>"></script>
  <!-- sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo base_url('/assets/js/ajax.js'); ?>"></script>

 <!-- My Script -->
 <script>
         $(document).on('submit', '#login_form', function () {
          
          $.post("<?=base_url('index.php/LoginController/Login')?>", $("#login_form").serialize(),
              function (data) {
                  
                  d = JSON.parse(data)
                  var test = JSON.parse(data)
                  if(d.status == 1)
                  {
                      swal({
                          icon: "success",
                          text: "เข้าสู่ระบบสำเร็จ ยินดีต้อนรับ",
                          
                          
                          
                      })
                      setTimeout("location.href = 'http://localhost/AOT-Document/index.php/IndexController';",5000);
                      //document.getElementById("demo").innerHTML = d[0].msg;
                      //alert("asd")
                  }
                  else
                  {
                      
                      swal({
                          icon: "error",
                          text: data,
                          
                      });
                  }

              }
          );

        event.preventDefault();
    });

    $(document).on('submit', '#notify_form', function () {
          
          $.post("<?=base_url('index.php/LinenotifyController/notify')?>", $("#notify_form").serialize(),
              function (data) {
                  
                  d = JSON.parse(data)
                  var test = JSON.parse(data)
                  if(d.status == 1)
                  {
                      swal({
                            icon: "success",
                            text: d.msg,
                      });
                      
                     setTimeout("location.href = 'http://localhost/AOT-Document/index.php/LoginController';",1000);
                      //document.getElementById("demo").innerHTML = d[0].msg;
                      //alert("asd")
                  }
                  else
                  {
                      
                      swal({
                            icon: "error",
                             text: d.msg,
                          
                      });
                      //base_url('index.php/RegisterController/insert_user');
                      //setTimeout("location.href = 'http://localhost/SystemOfUniver/index.php/RegisterController/insert_user';",5000);
                  }

              }
          );

        event.preventDefault();
    });
 </script>

</body>

</html>