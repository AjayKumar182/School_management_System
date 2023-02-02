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
                window.location.href="admin_view.php";
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
           
    
           $sql = "SELECT * FROM fees,student WHERE student.reg_num=fees.reg_num;";

            $result = mysqli_query($conn, $sql);  
         
            $count = mysqli_num_rows($result);  
        

           ?>
           
                       

     <div id="disp">
        <h2><center>FEES DETAILS </center></h2>
        

        <table border="1px solid black">
        <tr id="header">  
          <th> NAME</th>
          <th>REG_NUM</th>
          <th>CLASS</th>
          <th>PHONE NUM</th>
          <th>TOTEL</th>
          <th>PAID</th>
          <th>BALANCE</th>
          <th>PAID DATE</th>
          
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
                      <td><?php echo $row['totel']; ?></td>
                      <td><?php echo $row['paid']; ?></td>
                      <td><?php echo $row['balance']; ?></td>
                      <td><?php echo $row['time']; ?></td>
                      
                     
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
                echo 'alert(" NO fee data exist");';
                echo 'window.location.href="admin_view.php";';
                echo '</script>' ;
            }


        
          
            ?>
            