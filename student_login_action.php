<?php
     session_start();
     

include('connection.php');  
$reg = $_POST['user_name'];  
$password = $_POST['password'];  

  
    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);  
  
    $sql = "select * from student where reg_num='$reg' and password = '$password'";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
    $count = mysqli_num_rows($result); 

    if($count>=1)
    {
        $_SESSION['student_name']=$row['name'];
        $_SESSION['student_reg']=$row['reg_num'];

        
?>
       
       <html>
        <body>
            <input type="text" id="name" value="<?php  echo $row['name'];  ?>"> </input>
    </body>

        
       
           <script type="text/JavaScript">
            var Name = document.getElementById("name").value;
            alert("WELCOME "+Name+" ");
            window.location.href="student_function.php";
            </script>

            <?php

    }
              
              else{
                echo '<script> type="text/JavaScript">';
            echo 'alert("Login failed \n invalid user_id or password");';
            echo 'window.location.href="student_login.html";';
            echo '</script>' ;
              }
             ?>
</html>
