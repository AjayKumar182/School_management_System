


<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="header.css" rel="stylesheet" type="text/css">
        <link href="body.css" rel="stylesheet" type="text/css">
        <link href="sidebar.css" rel="stylesheet" type="text/css">
        <link href="view_prof.css" rel="stylesheet" type="text/css">
        <title>Teacher Page</title>
        <style>
            #disp1{
                padding: 30px;
   margin-top: 2cm;
   margin-right: 1cm;
   margin-left: 7cm;
   border-radius: 20px;
   border: 3px solid black;
   background-color: rgba(184, 235, 224, 0.507);
            }
             
        </style>
         <script>
            function back()
            {
                window.location.href="class_teacher_function.php";
            }
            </script>
        <header>
            <nav>
                <a id="home" href="#" >Home</a>
                
                <a id="logout" href="teacher_logout.php">Logout</a>
                
                
            </nav>
        </header>
        <body>
          
               
                    
            <?php

include('connection.php');
if(isset($_SESSION['teacher_id'])){
    
     
     $tid=$_SESSION['teacher_id'];

     $sql="SELECT class_id from staff_type WHERE teacher_id='$tid';";
     $result=mysqli_query($conn,$sql);

     $row=mysqli_fetch_array($result);
     $std=$row['class_id'];

     $sql1="SELECT reg_num,class_id,totel_class,present from attendence where teacher_id='$tid' and class_id='$std';";
     $result2=mysqli_query($conn,$sql1);

      $count=mysqli_num_rows($result2);
      if($count>=1)
      {

      


?>   


    <div id="disp1">
            <h2><center>Attendence List </center></h2>
        
            <table border="1px solid black">
        <tr id="header">  
          <th> REG_NUM</th>
          
          <th>CLASS</th>
          <th>TOTEl CLASS</th>
          <th>PRESENTED</th>
          <th>PERCENTAGE</th>
          
              </tr>
        <?php         
              
                while($row2=mysqli_fetch_array($result2))
                 {
            ?>
                      
                      <tr>

                      <td><?php echo $row2['reg_num']; ?></td>
                      <td><?php echo $std ?></td>
                      <td><?php echo $row2['totel_class']; ?></td>
                      <td><?php echo $row2['present']; ?></td>
                      <td><?php $temp=($row2['present']/$row2['totel_class'])*100;   echo intval($temp)."%"; ?></td>
                      
              </tr>
          
              <?php
                 }
                 ?>
                 </table>

              

            <p>
      <input type="button" value="BACK" name="UPDATE" onclick="back()" class="btn1"/>
      </p>
  
  </div>
  
  <?php

        }

        else{
            echo '<script type="text/JavaScript">';
            echo 'alert("attendence not updated");';
            echo 'window.location.href="class_teacher_function.php";';
            echo '</script>' ;
        }
    }

    else{
        echo '<script type="text/JavaScript">';
        echo 'alert("please login to continue");';
        echo 'window.location.href="teacher_login.html";';
        echo '</script>' ;
    }
    ?>
  

    </body>
    </html>
      
      


                




     

                
           

           