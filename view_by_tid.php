<!DOCTYPE html>
<html>
    <head>
        <link href="header.css" rel="stylesheet" type="text/css">
        <link href="body.css" rel="stylesheet" type="text/css">
        <link href="sidebar.css" rel="stylesheet" type="text/css">
        <link href="view_prof.css" rel="stylesheet" type="text/css">

        
        <title>Admin Page</title>
        
             

        </head>
        <script>
            function back()
            {
                window.location.href="view_teacher.php";
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
            if(isset($_POST['tid']))
            {

            $tid=$_POST['tid'];

    
            $sql = "SELECT * FROM `teacher` WHERE tid='$tid';";
            $sql2="SELECT sub_name from teacher,subject WHERE teacher.sub=subject.sub_id AND teacher.tid='$tid';";

            $result = mysqli_query($conn, $sql);  
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
        

           
            if( $count>=1)
            {
                $result1 = mysqli_query($conn, $sql2);
                 $row2=mysqli_fetch_array($result1);
                 $result2 = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_array($result2))
              {
                        
                       $name=$row[0];
                         $tid=$row[1];
                            $gender=$row[3];
                           $phone=$row[4];
                          $email=$row[5];
                            $bdate=$row[6];
                    
                        
                            $address=$row[7];
                            $salery=$row[8];
                            
    
     

    }
    
  

     ?> 
     <div id="adding_form">
        <h2><center>TEACHER DETAIL</center></h2>
        <form  method="post"  id="addform" >

        <table>
     
        
    <tr> 
        <th><label>TEACHER ID:</label></th> 
        <td><?php echo $tid; ?></td> 
    </tr>
    

    <tr> 
        <th><label>NAME:</label></th>
        <td><?php echo $name; ?></td>
    <tr>

    <tr> 
        <th><label>SUBJECT:</label></th>
        <td><?php echo $row2[0]; ?></td>
    <tr>
    
    
    
    <tr> 
        <th><label>Phone:</label></th>
         <td><?php echo $phone; ?></td>
     </tr>
    
    
        <tr>
    <th><label>Email:</label></th>
   <td> <?php echo $email; ?></td>
</tr>


    
        <tr>
      <th><label>DOB:</label></th>
       <td><?php echo $bdate; ?></td>
</tr>
        
    
        
            <tr>
        <th><label>ADDRESS:</label></th>
         <td><?php echo $address; ?></td>
</tr>   
     


     
        <tr>       
     <th><label>SALERY</label></th>
      <td><?php echo "RS ".$salery; ?></td>
</tr>
    
     
      
    
                    
</table>
      
    <p>
    <input type="button" value="BACK" name="UPDATE" onclick="back()" class="btn"/>
    </p>
</form>
</div>

    <?php
            }

            else
            {
                echo '<script type="text/JavaScript">';
                echo 'alert("Teacher doesnot exist");';
                echo 'window.location.href="view_teacher.php";';
                echo '</script>' ;
            }

        }
          
            ?>