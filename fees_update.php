<?php

include('connection.php');

$reg=$_POST['reg'];
$totel=$_POST['totel'];
$balence=$_POST['balence'];
$paid=$_POST['paid'];
$pay=$_POST['pay_bal'];

$bal=$balence;

$paid1=$paid+$pay;

$balence=$totel-$paid1;

$sql="UPDATE fees SET paid='$paid1',balance='$balence' WHERE  reg_num='$reg';";

if( $conn->query($sql)==TRUE)

{
    echo '<script type="text/JavaScript">';
    echo 'alert("FEE COLLECTION DONE");';
    echo 'window.location.href="fees_collect.php";';
    echo '</script>';
}
else{


echo '<script type="text/JavaScript">';
echo 'window.location.href="fees_collect.php";';
echo '</script>' ;
}
?>




