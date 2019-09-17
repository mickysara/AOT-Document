<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<button id="like-btn">Like!</button>
<a href="" id="1" class="hello">aaa</a>
<a href="" id="2" class="hello">aaa</a>
</body>
</html>
  
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

<script>
$(document).ready(function() {
    $(".hello").click(function(event) {
       var id = event.target.id;
        alert(id);
    });
});
</script>