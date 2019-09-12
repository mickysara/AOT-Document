<?php   $dateshow = date("Y/m/d");
        $d=strtotime("+10 Days");
        $dateendshow = date("Y/m/d",$d);

        $newDate = date("d-m-y", strtotime($dateshow));


echo(date("d-m-y", strtotime($dateendshow)));
echo('....');
echo(date("d-m-y", strtotime($dateshow)));

if($dateendshow >= $dateshow){
    echo('วันหมดอายุมากกว่า');
}else{
    echo('วันหมดอายุน้อยกว่า');
}
?>