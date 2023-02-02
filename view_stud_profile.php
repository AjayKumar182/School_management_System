<?php

session_start();
if(!(isset($_SESSION['student_reg'])))
{
  echo '<script type="text/JavaScript">';
  
  echo 'alert("Please login to continue");';
  echo 'window.location.href="teacher_login.html";';
  echo '</script>' ;
}
include('connection.php');

$reg=$_SESSION['student_reg'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="header.css" rel="stylesheet" type="text/css">
        <link href="body.css" rel="stylesheet" type="text/css">
        <link href="sidebar.css" rel="stylesheet" type="text/css">
        <link href="profile.css" rel="stylesheet" type="text/css">

        
        <title>Admin Page</title>
        
             

        </head>
        <script>
            function back()
            {
                window.location.href="student_function.php";
            }
            </script>
        <header>
            <nav>
                <a id="home" href="home.html" >Home</a>
                
                <a id="logout" href="admin_logout.php">Logout</a>
                
                
            </nav>
        </header>
<?php


            
            

        

    
            $sql = "SELECT * FROM student WHERE reg_num='$reg';";
                   
            $result = mysqli_query($conn, $sql);  
            
            $count = mysqli_num_rows($result);  
        

           
            if( $count>=1)
            {
                
                while($row=mysqli_fetch_array($result))
              {
                        
                       $name=$row[1];
                         $reg=$row[2];
                            $gender=$row[3];
                           $phone=$row[4];
                          $email=$row[5];
                            $bdate=$row[6];
                             $std=$row[7];
                        
                            $father=$row[8];
                            $address=$row[9];
                            
    
     

    }
    
  

     ?> 
     <div id="adding_form">
        <h1 style="font-family: 'Dancing Script', cursive;"><center>Profile</center></h1>
        <form  method="post"  id="addform" >

        <table>
     
        
    <tr> 
        <th><label>REG_NUM:</label></th> 
        <td><?php echo $reg; ?></td> 
    </tr>
    

    <tr> 
        <th><label>NAME:</label></th>
        <td><?php echo $name; ?></td>
    <tr>

    <tr> 
        <th><label>Class:</label></th>
        <td><?php echo $std; ?></td>
    <tr>

    <tr> 
        <th><label>GENDER:</label></th>
        <td><?php echo $gender; ?></td>
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
        <th><label>Father Name:</label></th>
         <td><?php echo $father; ?></td>
</tr>   
        
            <tr>
        <th><label>ADDRESS:</label></th>
         <td><?php echo $address; ?></td>
</tr>   
     


     

    

      
    
                    
</table>
      
    <p>
    <input type="button" value="BACK" name="UPDATE" onclick="back()" class="btn"/>
    </p>
</form>
</div>

<?php
            }
            ?>
            </body>
            </html>

    