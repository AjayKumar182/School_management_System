
<?php
session_start();
include('connection.php');
if((isset($_SESSION['student_reg'])))
{
    
 

?>
<!DOCTYPE html>
<html>
    <head>
        <link href="header.css" rel="stylesheet" type="text/css">
        <link href="body.css" rel="stylesheet" type="text/css">
        <link href="sidebar.css" rel="stylesheet" type="text/css">
        <link href="box_view.css" rel="stylesheet" type="text/css">
        <title>Student Page</title>  
         </head>
        <header>
            <nav>
                <a id="home" href="#" >Home</a>
                
                <a id="logout" href="admin_logout.php">Logout</a>
                
                
            </nav>
        </header>
        <body>
            <div class="sidebar">
               
            <li>
                        <ul> <a id="sidemenu" href="view_stud_profile.php">PROFILE</a></ul>
                   
                   <ul> <a id="sidemenu" href="view_stud_marks.php">View Marks</a></ul>
                   <ul> <a id="sidemenu" href="#">CHANGE PASSWORD</a></ul>

                  

                   </li>
                
                
    

            </div>
            
             <?php
            
             if(isset($_SESSION['student_reg'])){
               echo  "<center><h1>welcome ".$_SESSION['student_name']."</center></h1>";
               $reg=$_SESSION['student_reg'];
             }
             else{
              echo '<script type="text/JavaScript">';
              echo 'alert("Please login to continue");';
              echo 'window.location.href="student_login.html";';
              echo '</script>' ;
             }

             $sql="SELECT * FROM attendence where reg_num='$reg';";
             $sql2="SELECT * FROM fees where reg_num='$reg';";

             $result=mysqli_query($conn,$sql);
             $result2=mysqli_query($conn,$sql2);
             $count=mysqli_num_rows($result);
           
              $row=mysqli_fetch_array($result);
              $row2=mysqli_fetch_array($result2);
               ?>

            <div id="view">
                <div id="att" >
                  <h3>  <center> Attendence</center></h3>
                    <?php
                      if($count>=1)
                      {
                    ?>

                <p> <span> TOTEL_CLASS : <?php echo $row[2]; ?></span></p>
                <p> <span> PRESENT : <?php echo $row[3]; ?></span></p>
                <label for="file">Percentage:</label>
              <progress id="file" value="<?php $temp=($row[3]/$row[2])*100; echo intval($temp); ?>" max="100"> <?php echo $temp; ?> </progress>
              <p> <span> Percentage: <?php echo intval($temp)."%"; ?></span></p>
             <?php
                      }  
                      else{
                        echo "<h3><center> NOT UPDATED</center></h3>";
                      }
                      ?>
                </div>

                <div id="bal" >
                <h3>  <center> FEES</center></h3>
                <p> <span> TOTEL : <?php echo $row2[3]; ?></span></p>
                <p> <span> PAID : <?php echo $row2[4]; ?></span></p>
                <p> <span> BALANCE : <?php echo $row2[5]; ?></span></p>
                <p> <span> PAID_DATE : <?php echo $row2[6]; ?></span></p>  
                   
                </div>

               
            </div>

            
            
           
        </body>
        <?php

}

else{
    echo '<script type="text/JavaScript">';
              echo 'alert("Please login to continue");';
              echo 'window.location.href="student_login.html";';
              echo '</script>' ;
}
       ?> 
   
    
</html> 