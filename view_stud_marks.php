<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="header.css" rel="stylesheet" type="text/css">
        <link href="body.css" rel="stylesheet" type="text/css">
        
      
        <link href="view_prof.css" rel="stylesheet" type="text/css">
        <title>Teacher Page</title>
        <style>
             .btn1{
                padding: 10px;
    background-color: #5d9cec;
    color: #f5f7fa;
    cursor: pointer;
    border-radius: 4px;
    width: 20%;
    border: 1px solid black;
    font-size: 1.1em;
    border-radius: 20px;
    margin-left: 10cm;
             }
             #disp1{
                padding: 30px;
   margin-top: 2cm;
   margin-right: 5cm;
   margin-left: 7cm;
   border-radius: 20px;
   border: 3px solid black;
   background-color: rgba(184, 235, 224, 0.507);
            }

            th{
              width:3cm;
            }
            table{
              margin-left:3cm;
            }
           label {
            margin-left:3cm;
            }
             
        </style>
        <script>
            function back()
            {
                window.location.href="student_function.php";
            }
            </script>
        <header>
            <nav>
                <a id="home" href="#" >Home</a>
                
                <a id="logout" href="admin_logout.php">Logout</a>
                
                
            </nav>
        </header>
       
          <?php

            include('connection.php');
            if(isset($_SESSION['student_reg'])){
                
                 
                 $reg=$_SESSION['student_reg'];

                 $sql = "SELECT * FROM `marks`,subject WHERE marks.sub_id=subject.sub_id and reg_num='$reg';";
                 $result=mysqli_query($conn,$sql);
                 $count = mysqli_num_rows($result); 
            ?>


<?php

   if($count>=1)
   {

   ?>
                 <div id="disp1">
                 <form   >

               <p> <h2> <center>MARKS</center></h2></p>

               <p>
                <label>REG_NUM:            <?php echo $reg; ?><label>
   </p>
               <table border="1px solid black">
        <tr id="header"> 
          <th> Sub_ID</th>
          <th>Subject</th>
          <th>Max Marks</th>
          <th>obtained</th>
          <th>Result</th>
   </tr>
   
   <?php

     while($row=mysqli_fetch_array($result))
     {
        ?>


        <tr>  
          <td> <?php echo $row[2]; ?></td>
          <td><?php echo $row[7]; ?></td>
          <td><?php echo $row[3]; ?></td>
          <td><?php echo $row[4]; ?></td>
          <td><?php $temp=($row[4]/$row[3])*100;  if($temp>40) echo "PASS"; else echo "FAIL"; ?> </td>
     </tr>

     <?php
     }
     ?>

                 
    </table>
              <p>   
              <input type="button" value="Back" name="GET DATA" class="btn1"  onclick="back();"/>
            </p>

       </form>
          </div>

          
        <?php 
            }

            else{
                echo '<script> type="text/JavaScript">';
                echo 'alert("Marks Not Updated");';
                echo 'window.location.href="student_function.php";';
                echo '</script>' ;
            }
        
        
        }

        else{
            echo '<script> type="text/JavaScript">';
            echo 'alert("Please login to continue");';
            echo 'window.location.href="student_login.html";';
            echo '</script>' ;
        }
    

         
              
        
?>



