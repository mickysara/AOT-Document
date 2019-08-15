  
  <script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
  <!-- Core -->
  <script src="<?php echo base_url('/assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/popper/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/bootstrap/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/headroom/headroom.min.js'); ?>"></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url('/assets/vendor/onscreen/onscreen.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/nouislider/js/nouislider.min.js'); ?>"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- DatePicker -->
<script src="<?php echo base_url('/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url('/assets/js/argon.js?v=1.0.1'); ?>"></script>
  <!-- sweetalert -->
 
  <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo base_url('/assets/js/ajax.js'); ?>"></script>
  <!-- DashBoard -->>
  <script src="<?php echo base_url('/assets/js/argon-dashboard.js?v=1.0.0'); ?>"></script>


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
                          text: "username หรือ Password นี้ไม่มีในระบบ",
                          
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
<script>
$(document).ready( function () {
    $('#Filetable').DataTable();
} );
$(document).ready( function () {
    $('#member').DataTable();
} );
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>jQueryold = jQuery.noConflict( true );</script>

<!-- FlexSlider -->
<script src="<?php echo base_url('/assets/js/jquery.flexslider.js'); ?>"></script>

<script type="text/javascript">
          $(function(){
            SyntaxHighlighter.all();
          });
          jQueryold(window).load(function(){
            $('#carousel').flexslider({
              animation: "slide",
              controlNav: false,
              animationLoop: false,
              slideshow: false,
              itemWidth: 210,
              itemMargin: 5,
              asNavFor: '#slider'
            });

            $('#slider').flexslider({
              animation: "slide",
              controlNav: false,
              animationLoop: false,
              slideshow: false,
              sync: "#carousel",
              start: function(slider){
                $('body').removeClass('loading');
              }
            });
          });
</script>
<script>
$(document).ready(function(e) {
	increaseNotify();
    setInterval(increaseNotify, 3000);
});
function increaseNotify(){ // โหลดตัวเลขทั้งหมดที่ถูกส่งมาแสดง
          $.get("<?=base_url('index.php/LoginController/IncreaseNoti')?>", 
              function (data) {
                if(data > 0)
                {
                  $("#Noti").html(data)
                }  
            

              }
          );
          $.get("<?=base_url('index.php/LoginController/IncreaseDetailNoti')?>",
            function (data)
            {
                $("#DetailNoti").html(data)
            }
          );
}

</script>

<script>

var myEl = document.getElementById('Hi');

        myEl.addEventListener('click', function() {
          $.get("<?=base_url('index.php/LoginController/DecreaseNoti')?>",
                    function(data){

                      $("#Noti").html(data)

                    }
                  )
        }, true);
</script>
<script>



var myEl = document.getElementById('Search');


        myEl.addEventListener('click', function() {
          var val = document.getElementById('searchtxt').value  
          console.log(val)
          $.get("<?=base_url('index.php/SearchController/serach/')?>"+val,
                    function(data){

                      $("#Showsearch").html(data)

                    }
                  )
        }, true);
</script>

<script>
      $(document).on('submit', '#AdSearch', function () {
          
          $.post("<?=base_url('index.php/AdvanceSearchController/advanceSearch')?>", $("#AdSearch").serialize(),
              function (data) {
                  
                 $("#Showsearch").html(data);


              }
          );

        event.preventDefault();
    });
</script>


<!-- Syntax Highlighter -->
<script src="<?php echo base_url('/assets/js/shCore.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/shBrushXml.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/shBrushJScript.js'); ?>"></script>



<!-- Optional FlexSlider Additions -->
<script src="<?php echo base_url('/assets/js/jquery.easing.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/jquery.mousewheel.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/demo.js'); ?>"></script>


</body>

</html>
