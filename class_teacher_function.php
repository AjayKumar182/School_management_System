<?php
session_start();
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
                
                <a id="logout" href="teacher_logout.php">Logout</a>
                
                
            </nav>
        </header>
        <body>
            <div class="sidebar">
               
                     <li>
                        <ul> <a id="sidemenu" href="view_teach_profile.php">PROFILE</a></ul>
                   <ul> <a id="sidemenu" href="add_marks.php">ADD STUDENT MARKS</a></ul>
                   
                   <ul> <a id="sidemenu" href="attendence.php"> ATTENDANCE</a></ul>
                   <ul> <a id="sidemenu" href="view_attendence.php">View Attendance</a></ul> 
                   <ul> <a id="sidemenu" href="view_marks.php">View Marks</a></ul>
                   <ul> <a id="sidemenu" href="">CHANGE PASSWORD</a></ul>

                  

                   </li>
                
    

            </div>
            <?php
           if(isset($_SESSION['teacher'])){
             echo  "<center><h2>welcome ".$_SESSION['teacher']."</center></h2>";
           }
           else{
            echo '<script> type="text/JavaScript">';
            echo 'alert("Please login to continue");';
            echo 'window.location.href="teacher_login.html";';
            echo '</script>' ;
           }
             ?>

            

            
            
           
        </body>
        
    </head>
    
</html>