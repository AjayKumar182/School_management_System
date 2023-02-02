<?php
session_start();
if(isset($_SESSION['teacher_id'])){
                
                 
    $tid=$_SESSION['teacher_id'];
}

    else{

        echo '<script type="text/JavaScript">';
        echo 'alert("please login to continue");';
        echo 'window.location.href="teacher_login.html";';
        echo '</script>' ;
    }

include('connection.php');  

$reg=$_POST['reg'];
$year=$_POST['year'];
$totel=$_POST['totel'];
$present=$_POST['pres'];
$class=$_POST['class'];

$sql="SELECT * from attendence where reg_num='$reg';";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

if($count>=1)
{
    $sql2="UPDATE attendence set totel_class='$totel',present='$present',academic_year='$year',class_id='$class' where reg_num='$reg' and teacher_id='$tid';";
       if($conn->query($sql2)==TRUE)
       {
        echo '<script type="text/JavaScript">';
        echo 'alert("Attendence Updated");';
        echo 'window.location.href="attendence.php";';
        echo '</script>' ;
       }
}
else{
    $sql1="INSERT into attendence value('$tid','$reg','$totel','$present','$year','$class');";
    if($conn->query($sql1)==TRUE)
    {
     echo '<script type="text/JavaScript">';
     echo 'alert("Attendance updated");';
     echo 'window.location.href="attendence.php";';
     echo '</script>' ;
    }

}


?>

