<?php     
include('connection.php'); 
//session_start(); 
 $one="";
  $two="";
$three="";
$four="";
$five="";
$sixth="";
 $seventh="";
$eigtht="";
$ningth="";
$tenth="";


$admin=1;
$name = $_POST['name'];  
$tid= $_POST['tid'];
$gender=$_POST['gender'] ;
$phone=$_POST['phone'];
$email=$_POST['email'];
$bdate=$_POST['bdate'];
$sub=$_POST['sub'];
$address=$_POST['address'];
$password=$_POST['password'];
$salery=$_POST['salery'];
 
$i=0;

if(isset($_POST['1st']))
{
$one=$_POST['1st'];
$class[$i]=$one;
$i++;
}
if(isset($_POST['2nd'])){

  $two=$_POST['2nd'];
  $class[$i]=$two;
$i++;
}

if(isset($_POST['3rd']))
{
$three=$_POST['3rd'];
$class[$i]=$three;
$i++;
}
if(isset($_POST['4th']))
{
$four=$_POST['4th'];
$class[$i]=$four;
$i++;
}
if(isset($_POST['5th']))
{
$five=$_POST['5th'];
$class[$i]=$five;
$i++;
}
if(isset($_POST['6th']))
{
  $sixth=$_POST['6th'];
  $class[$i]=$sixth;
$i++;
}
if(isset($_POST['7th']))
{
$seventh=$_POST['7th'];
$class[$i]=$seventh;
$i++;
}
if(isset($_POST['8th']))
{
$eigtht=$_POST['8th'];
$class[$i]=$eigtht;
$i++;
}
if(isset($_POST['9th']))
{
$ningth=$_POST['9th'];
$class[$i]=$ningth;
$i++;
}
if(isset($_POST['10th']))
{
$tenth=$_POST['10th'];
$class[$i]=$tenth;
$i++;
} 
    $newDate = date("Y-m-d", strtotime($bdate));  
 // function   message(){
    //echo '<script type="text/JavaScript">';
    //echo 'alert(" Student record Added");';
    //echo '</script>' ; 
  //}
  
   
          
    
    
    ?>
   
    
<html>
    <head>
        <link href="header.css" rel="stylesheet" type="text/css">
        <link href="body.css" rel="stylesheet" type="text/css">
        <link href="sidebar.css" rel="stylesheet" type="text/css">
        <title>Admin Page</title>
        <style>
             
        </style>
        <header>
            <nav>
                <a id="home" href="#" >Home</a>
                
                <a id="logout" href="admin_logout.php">Logout</a>
                
                
            </nav>
        </header>
        <body>
            <div class="sidebar">
               
                     <li>
                   <ul> <a id="sidemenu" href="add_student.html">ADD STUDENT</a></ul>
                   
                   <ul> <a id="sidemenu" href="update_student.php">UPDATE STUDENT</a></ul>
                   <ul> <a id="sidemenu" href="add_teacher.html">ADD TEACHER</a></ul>
                    
                   <ul> <a id="sidemenu" href="update_teacher.php">UPDATE TEACHER</a></ul>
                   <ul> <a id="sidemenu"href="fees_collect.php">FEE COLLECTION</a></ul>
                    <ul> <a id="sidemenu"href="admin_view.php">VIEW</a></ul>

                   </li>
                
    

            </div>
            <?php

                    $sql = "SELECT tid FROM teacher WHERE tid='$tid';";

                    $result = mysqli_query($conn, $sql);  
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                    $count = mysqli_num_rows($result);  


                 if($count>=1)
                 {

                  echo '<script> type="text/JavaScript">';
                  echo 'alert(" Teacher with this teacher_id  already exist");';
                  echo 'window.location.href="admin_view.php";';
                  echo '</script>' ;
                 }

            else{
                 

                    
                    
                    $sql1 = "insert into teacher values('$name','$tid','$sub','$gender','$phone','$email','$newDate','$address','$salery','$password');";  
 
                      if( $conn->query($sql1)==TRUE)
                      {
                         for($k=0;$k<$i;$k++)
                         {
                          $sql2="insert into class_handels values('$class[$k]','$tid');";
                          $result2 = mysqli_query($conn,$sql2);
                     
                         }
                        
            
             
                               
                        }
                           else{
                               die("Error:".$conn->error);

                               }
                    }

                    if($k==$i)
                    {
                      echo '<script> type="text/JavaScript">';
                      echo 'alert(" Teacher DATA ADDED SUCCESSFULLY");';
                      echo 'window.location.href="admin_function.html";';
                      echo '</script>' ;
                    }
                    
                 ?>
    




            
           
           
        </body>
        
    </head>
    
</html>