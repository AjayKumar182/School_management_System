
<?php      
include('connection.php');  
$admin=1;
$name = $_POST['name'];  
$reg= $_POST['reg'];
$gender=$_POST['gender'] ;
$phone=$_POST['phone'];
$email=$_POST['email'];
$bdate=$_POST['bdate'];
$std=$_POST['std'];
$fname=$_POST['fname'];
$address=$_POST['address'];
$password=$_POST['password'];
$totel=$_POST['totel'];
$fee_paid=$_POST['fee_paid'];
$balence=$totel-$fee_paid;

  
    $newDate = date("Y-m-d", strtotime($bdate));  
  function   message(){
    echo '<script type="text/JavaScript">';
    echo 'alert(" Student record Added");';
    echo '</script>' ; 
  } 
    //echo "New date format is: ".$newDate. " (YYYY/MM/DD)";  
  
    //to prevent from mysqli injection  
   // $username = stripcslashes($username);  
    //$password = stripcslashes($password);  
    //$username = mysqli_real_escape_string($conn, $username);  
    //$password = mysqli_real_escape_string($conn, $password);  

    $sql = "SELECT reg_num FROM `student` WHERE reg_num='$reg';";

    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  

   
          
    
    
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

                 if($count>=1)
                 {

                  echo '<script type="text/JavaScript">';
                  echo 'alert(" REG NUM ALREADY EXIST");';
                  echo 'window.location.href="add_student.html";';
                  echo '</script>' ;

                 }

            else{
                 

                    
                    
                    $sql1 = "insert into student values('$admin','$name','$reg','$gender','$phone','$email','$bdate','$std','$fname','$address','$password');";  
 
                      if( $conn->query($sql1)==TRUE)
                      {
                        $sql2="insert into fees(admin_id,reg_num,class,totel,paid,balance) values('$admin','$reg','$std','$totel','$fee_paid','$balence');";
                                     //$result2 = mysqli_query($conn,$sql2);
                                if($conn->query($sql2)==TRUE)
                                  {
                                     
                                            message();
            
                                            //header("location: admin_function.html");
                                          }
            
             
                               else{
                                     echo "<center><h1> Error in ADDing Student information</center></h1>"; 
                                   }
                        }
                           else{
                               die("Error:".$conn->error);

                               }
                    }
                 ?>
    




            
            
           
        </body>
        
    </head>
    
</html>