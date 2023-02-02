<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="header.css" rel="stylesheet" type="text/css">
        <link href="body.css" rel="stylesheet" type="text/css">
        <link href="sidebar.css" rel="stylesheet" type="text/css">
        <link href="add.css" rel="stylesheet" type="text/css">
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
                window.location.href="teacher_function.php";
            }
            </script>
        <header>
            <nav>
                <a id="home" href="#" >Home</a>
                
                <a id="logout" href="teacher_logout.php">Logout</a>
                
                
            </nav>
        </header>
       
          <?php

            include('connection.php');
            if(isset($_SESSION['teacher_id'])){
                
                 
                 $tid=$_SESSION['teacher_id'];

                 $sql="SELECT class_id from class_handels WHERE teacher_id='$tid';";
                 $result=mysqli_query($conn,$sql);
          
            ?>

                 <div id="adding_form">
                 <form  method="post" id="addform" >

               <p> <h2> <center>View marks</center></h2></p>
                   
             <p>
                <label> Select Class:</label>
                <select name="std"   id="std">
                <option value="">Select option</option>
                <?php
                while($row=mysqli_fetch_array($result))
                {
                    ?>
                   <option value="<?php echo $row[0]; ?>"><?php echo "Class-".$row[0]; ?></option> 

                   <?php
                }
            ?>
            </select>
                  </p>
                  
                  <p>
              <input type="submit" value="Submit" name="GET DATA" class="btn"/>
            </p>
            <p>
              <input type="button" value="Back" name="GET DATA" class="btn1"  onclick="back();"/>
            </p>

       </form>
          </div>

          
        <?php 
            }

            else{
                echo '<script> type="text/JavaScript">';
                echo 'alert("Please login to continue");';
                echo 'window.location.href="teacher_login.html";';
                echo '</script>' ;
            }
        
        

    
            if(isset($_POST['std']))
            {     

            $std=$_POST['std'];

              
            ?>

         
            
          
              </tr>
        <?php
           $sql = "SELECT sub from teacher  WHERE tid='$tid';";
         $result = mysqli_query($conn, $sql); 
         $row=mysqli_fetch_array($result);
         $sub=$row['sub'];
         
         $sql2="SELECT * from marks where teacher_id='$tid' and sub_id='$sub' and class_id='$std';";
         $result2= mysqli_query($conn, $sql2); 
       $count = mysqli_num_rows($result2);
        if( $count>=1)
            {
               ?>
                <div id="disp1">
            <h2><center>Marks</center></h2>
        
            <table border="1px solid black">
        <tr id="header">  
          <th> Reg_Num</th>
          <th>Subject</th>
          <th>Max Marks</th>
          <th>obtained</th>
          <th>Result</th>
          <?php
              
                while($row=mysqli_fetch_array($result2))
                 {
            ?>
                      
                      <tr>

                      <td><?php echo $row['reg_num']; ?></td>
                      <td><?php echo $sub; ?></td>
                      
                      <td><?php echo $row['totel_marks']; ?></td>
                      <td><?php echo $row['obtained']; ?></td>
                      <td><?php  $temp=($row['obtained']/$row['totel_marks'])*100;  if($temp>40) echo "pass"; else echo "Fail"; ?></td>
                      
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
    echo 'alert(" no marks  updated to this class");';
    echo 'window.location.href="teacher_function.php";';
    echo '</script>';
  }
}
?>



