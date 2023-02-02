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

$reg=$_POST['name'];
$sub=$_POST['sub_id'];
$totel=$_POST['totel'];
$obt=$_POST['obt'];
$std=$_POST['std'];

$sql="SELECT * from marks where reg_num='$reg' and sub_id='$sub' and teacher_id='$tid';";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

if($count>=1)
{
    $sql2="UPDATE marks set totel_marks='$totel',obtained='$obt',class_id='$std' where reg_num='$reg' and sub_id='$sub' and teacher_id='$tid';";
       if($conn->query($sql2)==TRUE)
       {
        echo '<script type="text/JavaScript">';
        echo 'alert("Marks Added");';
        echo 'window.location.href="add_marks.php";';
        echo '</script>' ;
       }
}
else{
    $sql2="INSERT into marks value('$tid','$reg','$sub','$totel','$obt','$std');";
    if($conn->query($sql2)==TRUE)
    {
     echo '<script type="text/JavaScript">';
     echo 'alert("Marks Added");';
     echo 'window.location.href="add_marks.php";';
     echo '</script>' ;
    }

}


?>

