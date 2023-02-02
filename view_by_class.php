<!DOCTYPE html>
<html>
    <head>
        <link href="header.css" rel="stylesheet" type="text/css">
        <link href="body.css" rel="stylesheet" type="text/css">
        
        <link href="view_prof.css" rel="stylesheet" type="text/css">

        
        <title>Admin Page</title>
        
             

        </head>
        <script>
            function back()
            {
                window.location.href="view_student.php";
            }
            </script>
        <header>
            <nav>
                <a id="home" href="home.html" >Home</a>
                
                <a id="logout" href="admin_logout.php">Logout</a>
                
                
            </nav>
        </header>
<?php

include('connection.php');
            if(isset($_POST['std']))
            {

            $class=$_POST['std'];

    
            $sql = "SELECT * FROM `student` WHERE std='$class';";

            $result = mysqli_query($conn, $sql);  
         
            $count = mysqli_num_rows($result);  
        

           ?>
           
                       

     <div id="disp">
        <h2><center>STUDENTS OF CLASS:<?php echo $class; ?> </center></h2>
        

        <table border="1px solid black">
        <tr id="header">  
          <th> NAME</th>
          <th>REG_NUM</th>
          <th>CLASS</th>
          <th>PHONE</th>
          <th>DOB</th>
          <th>EMAIL</th>
          <th>GENDER</th>
          <th>FATHER NAME</th>
          <th>ADDRESS</th>
              </tr>
        <?php
        if( $count>=1)
            {
               
              
                while($row=mysqli_fetch_array($result))
              {
            ?>
                      
                      <tr>

                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['reg_num']; ?></td>
                      <td><?php echo $row['std']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                      <td><?php echo $row['bdate']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['gender']; ?></td>
                      <td><?php echo $row['father_name']; ?></td>
                      <td><?php echo $row['address']; ?></td>
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


            else
            {
                echo '<script type="text/JavaScript">';
                echo 'alert(" NO Student exist");';
                echo 'window.location.href="view_student.php";';
                echo '</script>' ;
            }


        }
          
            ?>