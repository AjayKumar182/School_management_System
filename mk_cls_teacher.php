<?php
include('connection.php'); 
$tid=$_POST['tid'];
$std=$_POST['std'];
?>

<!DOCTYPE html>
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

             

             $sql = "SELECT * FROM staff_type WHERE class_id='$std';";

             $result = mysqli_query($conn, $sql);  
             $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
             $count = mysqli_num_rows($result);  

             
             
                if($count>=1)
                {

                   $sql= "DELETE from staff_type where class_id='$std';";
                   $result = mysqli_query($conn, $sql);  

                    
                }

           
                   $role="class_teacher";
                    $sql2="insert into staff_type values('1','$std','$tid','$role');";
                    if($conn->query($sql2)==TRUE)
                    {
                        echo '<script type="text/JavaScript">';
                        echo 'alert("NEW Class teacher Added");';
                        echo 'window.location.href="admin_view.php";';
                        echo '</script>' ;
                            

                            
                    }


                 else{
                       echo "<center><h1> Error </center></h1>"; 
                     }


                  
             

             ?>

            
            
           
        </body>
        
    </head>
    
</html>