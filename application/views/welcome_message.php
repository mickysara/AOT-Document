<!DOCTYPE html>
<html lang="en">
 <head>
 
 <body>
   <?php $path = "uploads/1561692394gpa.docx";
         $size = filesize($path);
         echo $size?>
 
 <div>
            <?php
            echo filesize($path);
            ?>
</div>

                <?php

                // outputs e.g.  somefile.txt: 1024 bytes

                $filename = "uploads/1561692394gpa.docx";
                echo $filename . ': ' . filesize($filename) . ' bytes';


                
                            
                            function randtext($range){
                            $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIGKLMNOPQRSTUVWXYZ';
                            $start = rand(1,(strlen($char)-$range));
                            $shuffled = str_shuffle($char);
                            return substr($shuffled,$start,$range);
                            } 
                            echo randtext(1);
                            

                ?>



 </body>
</html>