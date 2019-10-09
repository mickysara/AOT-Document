  
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
  <!-- DashBoard -->
  <script src="<?php echo base_url('/assets/js/argon-dashboard.js?v=1.0.0'); ?>"></script>
  <!-- Pusher -->

  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>



 <!-- My Script -->
 <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('fd6ef33b944c8da371ee', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
    d = JSON.parse(JSON.stringify(data))

    if(d.page == 'chat')
    {
        IncreaseChatByAsc();
        IncreaseChatRecent(); 
        IncreaseChatPopular();
    }
    });
  </script>

 <script>
   var val = document.getElementById('repository_id').value
    $(document).on('submit', '#addmember_form', function () {
          $.post("<?=base_url('MemberController/checkmember/')?>"+val, $("#addmember_form").serialize(),
              function (data) {
                  
                  d = JSON.parse(data)
                  var test = JSON.parse(data)
                  if(d.status == 1)
                  {
                      swal({
                            icon: "success",
                            text: "ระบบได้ทำการเพิ่มผู้ใช้ลงในทีมนี้เรียบร้อยแล้ว",
                      });
                      setTimeout(myfunction,2000);

                      function myfunction(){
                        location.reload();
                      }
                      
                      //document.getElementById("demo").innerHTML = d[0].msg;
                      //alert("asd")
                  }else if(d.status == 2){

                    swal({
                            icon: "error",
                             text: "มีพนักงานคนนี้อยู่ในทีมแล้วกรุณากรอกใหม่",
                          
                      });
                  }
                  else
                  {
                      
                      swal({
                            icon: "error",
                             text: "ไม่พบรหัสพนักงานนี้กรุณากรอกใหม่อีกครั้ง",
                          
                      });
                      //base_url('RegisterController/insert_user');
                      //setTimeout("location.href = 'http://localhost/SystemOfUniver/RegisterController/insert_user';",5000);
                  }
              }
          );
        event.preventDefault();
    });
</script>
<script>    
$(document).on('submit', '#chatroom_form', function () {
          
          $.post("<?=base_url('ChatroomController/joinroom')?>", $("#chatroom_form").serialize(),
              function (data) {
                  console.log(data)
                  d = JSON.parse(data);

                  if(d.status == 1)
                  {
                      swal({
                          icon: "success",
                          text: "เข้าสู่ห้องแชทสำเร็จ กรุณารอสักครุ่ระบบจะนำท่านไปยังห้องแชท " + d.data ,
                          
                          
                          
                      })
                      var x = location.href = "<?=base_url('/InchatroomController/showchat/')?>" + d.data;
                      setTimeout(x,4);
                      //document.getElementById("demo").innerHTML = d[0].msg;
                      //alert("asd")
                  }
                  else
                  {
                      
                      swal({
                          icon: "error",
                          text: "ไม่พบห้องแชท กรุณากรอกรหัสห้องแชทใหม่",
                          
                      });
                  }

              }
          );

        event.preventDefault();
    });
    </script>
 <script>
 
         $(document).on('submit', '#login_form', function () {
          
          $.post("<?=base_url('LoginController/Login')?>", $("#login_form").serialize(),
              function (data) {
                  
                  d = JSON.parse(data)
                  var test = JSON.parse(data)
                  if(d.status == 1)
                  {
                      swal({
                          icon: "success",
                          text: "เข้าสู่ระบบสำเร็จ ยินดีต้อนรับ",
                          
                          
                          
                      })
                      setTimeout(function () {location.href = '<?=base_url('MyDocumentController')?>'}, 3000);
                      //document.getElementById("demo").innerHTML = d[0].msg;
                      //alert("asd")
                  }else if(d.status == 2)
                  {
                    swal({
                          icon: "success",
                          text: "เข้าสู่ระบบสำเร็จ ยินดีต้อนรับ",
                          
                          
                          
                      })
                      setTimeout(function () {location.href = d.data}, 2000);
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
          
          $.post("<?=base_url('LinenotifyController/notify')?>", $("#notify_form").serialize(),
              function (data) {
                  
                  d = JSON.parse(data)
                  var test = JSON.parse(data)
                  if(d.status == 1)
                  {
                      swal({
                            icon: "success",
                            text: d.msg,
                      });
                      setTimeout(function () {location.href = '<?=base_url('IndexController')?>'}, 3000);
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
    $(document).on('submit', '#createchat', function () {
          
          $.post("<?=base_url('CreatechatroomController/createchatroom')?>", $("#createchat").serialize(),
              function (data) {
                  
                  d = JSON.parse(data)
                  var test = JSON.parse(data)
                  if(d.status == 1)
                  {
                      swal({
                            icon: "success",
                            text: "สร้างห้องแชทสำเร็จระบบจะนำท่านไปยังช่องแชท",
                      });
                    setTimeout(function () {
                        location.href = '<?=base_url('/AdminChatroomController/showchat/')?>'+ d.id
                        }, 
                        3000);
                      //document.getElementById("demo").innerHTML = d[0].msg;
                      //alert("asd")
                  }
                  else
                  {
                      
                      swal({
                            icon: "error",
                             text: "ห้องแชทนี่ได้ถูกสร้างขึ้นแล้วระบบจะนำท่านไปยังช่องแชท",
                          
                      });
                      setTimeout(function () {
                        location.href = '<?=base_url('/AdminChatroomController/showchat/')?>'+ d.id
                        }, 
                        2000);
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
$(document).ready( function () {
    $('#Filesearch').DataTable({
    });
    
} );
$(document).ready( function () {
    $('#Log').DataTable({
      "pageLength": 30
    });
    
} );
$(document).ready( function(){
    $('#imgqr').EZView();
});
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
          $.get("<?=base_url('LoginController/IncreaseDetailNoti')?>",
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
          $.get("<?=base_url('LoginController/DecreaseNoti')?>",
                    function(data){

                      $("#Noti").html(data)

                    }
                  )
        }, true);
</script>
<script>
function goBack() {
  window.history.back();
}
</script>

<script>
      $(document).on('submit', '#AdSearch', function () {
          
          $.post("<?=base_url('AdvanceSearchController/AdvanceSearch')?>", $("#AdSearch").serialize(),
              function (data) {
                  
                 $("#Showsearch").html(data);
                 $('#Filesearch').DataTable();

              }
          );

        event.preventDefault();
    });
</script>

<script>
      $(document).on('submit', '#Search', function () {
          
          $.post("<?=base_url('SearchController/serach')?>", $("#Search").serialize(),
              function (data) {
                  
                 $("#Showsearch").html(data);
                 $('#Filesearch').DataTable();

              }
          );

        event.preventDefault();
    });
</script>

<script>
$(document).ready(function(e) {
	  IncreaseChatByAsc();
    IncreaseChatRecent();
    IncreaseChatPopular();
    // setInterval(IncreaseChatByAsc, 1000);
    // setInterval(IncreaseChatRecent, 1000);
});
function IncreaseChatByAsc(){ // โหลดตัวเลขทั้งหมดที่ถูกส่งมาแสดง
    var val = document.getElementById('idchat').value
          $.get("<?=base_url('AdminChatroomController/IncreaseChatByAsc/')?>"+val,
            function (data)
            {
                $("#Message_Chatroom").html(data)
                          
            }
          );
}
function IncreaseChatRecent(){ // โหลดตัวเลขทั้งหมดที่ถูกส่งมาแสดง
    var val = document.getElementById('idchat').value
          $.get("<?=base_url('AdminChatroomController/IncreaseChatRecent/')?>"+val,
            function (data)
            {
                $("#recent_message").html(data)
            }
          );
}
function IncreaseChatPopular(){ // โหลดตัวเลขทั้งหมดที่ถูกส่งมาแสดง
    var val = document.getElementById('idchat').value
          $.get("<?=base_url('AdminChatroomController/IncreaseChatPopular/')?>"+val,
            function (data)
            {
                $("#Message_Popular").html(data)
            }
          );
}
</script>
<script>
      $(document).on('submit', '#sendchat_form', function () {
        var val = document.getElementById('idchat').value
          $.post("<?=base_url('InchatroomController/sendchat/')?>"+val, $("#sendchat_form").serialize(),
              function (data) {
                var val = "hello";
                $.post("<?=base_url('Test/sendmessage/')?>"+val,
                function (data) {

                    document.getElementById('text').value = "";


              });

              }
          );

        event.preventDefault();
    });
</script>
<script>
$(document).ready(function(e) {
	ShowMydoc();
});
        $("#Mydoc").on('click', function () {
          
          $.post("<?=base_url('MyDocumentController/myupload')?>",
              function (data) {
                  
                 $("#container").html(data);
                 $('#Filesearch').DataTable();

              }
          );

        event.preventDefault();
        });

        $("#MyRepos").on('click', function () {
          
          $.post("<?=base_url('MyDocumentController/MyRepository')?>",
              function (data) {
                  
                 $("#container").html(data);
                 $('#Filesearch').DataTable();

              }
          );

        event.preventDefault();
        });

        $("#InRepos").on('click', function () {
          
          $.post("<?=base_url('MyDocumentController/InRepository')?>",
              function (data) {
                  
                 $("#container").html(data);
                 $('#Filesearch').DataTable();

              }
          );

        event.preventDefault();
        });

        function ShowMydoc()   
        {
            $.post("<?=base_url('MyDocumentController/myupload')?>",
              function (data) {
                  
                 $("#container").html(data);
                 $('#Filesearch').DataTable();

              }
          );
        }
</script>
<script>
     function Like(id)
      {
                  console.log(id);
                  $.post("<?=base_url('InchatroomController/LikeMessage/')?>"+id,
                    function (data) {
                      var val = "hello";
                      $.post("<?=base_url('Test/sendmessage/')?>"+val,
                      function (data) {
                        IncreaseChatByAsc();
                    });
                    }
                  );
      }
      function DisLike(id)
      {
                  console.log(id);
                  $.post("<?=base_url('InchatroomController/DisLikeMessage/')?>"+id,
                    function (data) {
                      var val = "hello";
                      $.post("<?=base_url('Test/sendmessage/')?>"+val,
                      function (data) {
                        IncreaseChatByAsc();
                    });
                    }
                  );
      }

</script>



<!-- Syntax Highlighter -->
<script src="<?php echo base_url('/assets/js/shCore.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/shBrushXml.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/shBrushJScript.js'); ?>"></script>



<!-- Optional FlexSlider Additions -->
<script src="<?php echo base_url('/assets/js/jquery.easing.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/jquery.mousewheel.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/demo.js'); ?>"></script>


<script src="<?php echo base_url('/assets/js/EZView.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/draggable.js'); ?>"></script>
</body>

</html>
