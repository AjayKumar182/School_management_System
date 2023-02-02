<?php
     session_start();
     

include('connection.php');  
$tid = $_POST['user_name'];  
$password = $_POST['password'];  

  
    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);  
  
    $sql = "select * from teacher where tid='$tid' and password = '$password'";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
    $count = mysqli_num_rows($result); 

    if($count>=1)
    {
        $_SESSION['teacher']=$row['teacher_name'];
        $_SESSION['teacher_id']=$row['tid'];

        $sql2="SELECT role from staff_type where teacher_id='$tid';";
        $result2 = mysqli_query($conn, $sql2);  
        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC); 
        $count2 = mysqli_num_rows($result2);
?>
       
       <html>
        <body>
            <input type="text" id="name" value="<?php  echo $row['teacher_name'];  ?>"> </input>
    </body>

         <?php
        if($count2>=1)
        {
        ?>
           <script type="text/JavaScript">
            var Name = document.getElementById("name").value;
            alert("WELCOME "+Name+" ");
            window.location.href="class_teacher_function.php";
            </script>

            <?php

            }
            ?>
            <script type="text/JavaScript">
            var Name = document.getElementById("name").value;
            alert("WELCOME "+Name+" ");
            window.location.href="teacher_function.php";
            </script>
            <?php
              }
              else{
                echo '<script> type="text/JavaScript">';
            echo 'alert("Login failed \n invalid user_id or password");';
            echo 'window.location.href="admin_login.html";';
            echo '</script>' ;
              }
             ?>
</html>
