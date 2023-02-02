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
$tid= $_POST['teach_id'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$bdate=$_POST['bdate'];
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

                    
                    $sql="UPDATE teacher set teacher_name='$name',phone='$phone',email='$email',bdate='$bdate',address='$address',salary='$salery',password='$password' WHERE tid='$tid';";
                    //$result = mysqli_query($conn, $sql);  
                      if( $conn->query($sql)==TRUE)
                      {
                         for($k=0;$k<$i;$k++)
                         {
                            $sql3="SELECT * from class_handels where class_id='$class[$k]';";
                            $result = mysqli_query($conn, $sql3);  
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                            $count = mysqli_num_rows($result);  

                            if(!($count>=1))
                            {
                                $sql2="insert into class_handels values('$class[$k]','$tid');";
                                $result2 = mysqli_query($conn,$sql2);   
                            }
                            else{
                              $sql3="UPDATE class_handels set teacher_id='$tid' where class_id='$class[$k]';";
                              $result3 = mysqli_query($conn,$sql3);
                            }
                         
                     
                         }
                        
            
             
                               
                        }
                           else{
                               die("Error:".$conn->error);

                               }
                    

                    if($k==$i)
                    {
                      echo '<script> type="text/JavaScript">';
                      echo 'alert(" Teacher DATA UPDATED SUCCESSFULLY");';
                      echo 'window.location.href="admin_view.php";';
                      echo '</script>' ;
                    }
                    
                 ?>
    




            
           
           
        </body>
        
    </head>
    
</html>