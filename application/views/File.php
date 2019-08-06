<!DOCTYPE html>
<html lang=en>



 
<body>

  
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <br>
                <h1>File download example using Codeigniter</h1>
               <button onclick = "displaycount()"class="btn btn-primary">DOWNLOAD FILE</button> 
               <a href="<?php echo site_url('UploadController');?>" class="btn btn-primary">UPLOAD FILE</a> 
               <a href="<?php echo site_url('ViewController');?>" class="btn btn-primary">VIEW FILE</a>  
               <a href="<?php echo site_url('RepoController');?>" class="btn btn-primary">REPOSITORY</a> 
             <p id="carrier">0</p>
            </div>
        </div>
    </div>


</body>
 
<script>
             var count = (function(){
                 var counter = 0;
                 return function() {return counter +=1;}
             })();
             function displaycount(){
                 document.getElemenById("carrier").innerHTML = count();
             }
           </script>
</html>
