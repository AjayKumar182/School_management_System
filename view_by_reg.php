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
            if(isset($_POST['reg']))
            {

            $reg=$_POST['reg'];

    
            $sql = "SELECT reg_num FROM `student` WHERE reg_num='$reg';";

            $result = mysqli_query($conn, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
        

           
            if( $count>=1)
            {
               $sql1="SELECT * FROM student where reg_num='$reg'";
               $result2= mysqli_query($conn, $sql1);
                while($row2=mysqli_fetch_array($result2))
              {
                        $a=$row2[0];
                       $name=$row2['name'];
                         $reg=$row2[2];
                            $gender=$row2[3];
                           $phone=$row2[4];
                          $email=$row2[5];
                            $bdate=$row2[6];
                          $std=$row2[7];
                           $fname=$row2[8];
                            $address=$row2[9];
                             $password=$row2[10];
    
     

    }
    
  

     ?> 
     <div id="adding_form">
        <h2><center>STUDENT DETAIL</center></h2>
        <form  method="post"  id="addform" >

        <table>
     
        
    <tr> 
        <th><label>RegisterNumber:</label></th> 
        <td><?php echo $reg; ?></td> 
    </tr>
    

    <tr> 
        <th><label>NAME:</label></th>
        <td><?php echo $name; ?></td>
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
        <th><label>Class:</label></th>
         <td><?php echo $std; ?></td>
</tr>   
     


     
        <tr>       
     <th><label>Fathername:  </label></th>
      <td><?php echo $fname; ?></td>
</tr>
    
     
        <tr>      
    <th><label>Address: </label></th>
       <td><?php echo $address; ?></td>
       
    
                    
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
                echo 'alert(" Student doesnot exist");';
                echo 'window.location.href="view_student.php";';
                echo '</script>' ;
            }

        }
          
            ?>