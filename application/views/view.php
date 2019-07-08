


<div align="center" class="container">
<table border="1" style="width:100%">
  <tr>
      <br>
      <br>
    <td>S.No</td>
    <td>Name</td> 
    <td>Class</td>
    <td>Edit</td>
    <td>Download</td>
    
  </tr>
  <?php
    if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
    foreach ($view_data as $key => $data) { 
    ?>
    
  <tr>
    <td><?php echo $i++ ?></td>
    <td><?php echo $data['name']; ?></td> 
    <td><?php echo $data['url']; ?></td>
    <td><a href="<?php echo site_url(); ?>/multipleupload/edit/<?php echo $data['u_id'];?>"><button type="button" class="cancelbtn">Edit</button></td>
    <td><a href="<?=base_url ()?>uploads"><button type="button" class="cancelbtn">Download</button></td>
    
    <!-- <td><a href="<?php echo site_url(); ?>/multipleupload/edit/<?php echo $data['u_id']; ?>">Edit</a></td> -->
  </tr>
  <?php } endif; ?>
</table>
<br>
<p align="center"><a href="http://localhost:8080/Aot/Aot_Home_Control"><button type="button" class="cancelbtn">Back</button>
    
</div>