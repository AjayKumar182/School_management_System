<?php   
    session_start(); 
    include('connection.php');  
    $username = $_POST['user_name'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select * from admin where admin_name = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        ?>
<html>
    <head>
    <title> School management System</title>
    <style>
        nav{
            padding:15px;
            background-color: aqua;
            border-radius: 20px;
        }
        #home{
            text-decoration-line: none;
            font-size:20px;
            font-weight: 900;
            padding:10px;
            margin-right: 700px;

        }
        #stud{
           text-decoration-line: none;
            font-size:20px;
            font-weight: 900;
            padding:10px;
        }
        #admin{
            text-decoration-line: none;
            font-size:20px;
            font-weight: 900;
            padding:10px;
        }
        #teacher{
            text-decoration-line: none;
            font-size:20px;
            font-weight: 900;
            padding:10px;
        }
        

        
        a:hover{
            color: tomato;
            text-decoration: overline;
        }
        body{
            background: linear-gradient(120deg,#2980b9, #8e44ad);
            font-family: Arial;

        }


    </style>
    </head>
    <header>
        <nav>
            <a id="home" href="home.html" >Home</a>
            <a  id="admin" href="admin_login.html">Admin login</a>
            <a  id="teacher" href="teacher_login.html">Teacher login</a>
            <a id="stud" href="student_login.html">Student login</a>
            
        </nav>
    </header>
    <body>
    <?php
        $count = mysqli_num_rows($result);                           
        if($count == 1){  

            $_SESSION['admin']=$row['admin_name'];

            echo '<script> type="text/JavaScript">';
            echo 'alert(" WELCOME ADMIN");';
            echo 'window.location.href="admin_view.php";';
            echo '</script>' ;
                     
        }  
        else{  
            echo '<script> type="text/JavaScript">';
            echo 'alert("Login failed \n invalid user_id or password");';
            echo 'window.location.href="admin_login.html";';
            echo '</script>' ;
        }     
?>  
       
        
    </body>

</html>
        
        
        
     