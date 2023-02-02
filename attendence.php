
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
        <title>Admin Page</title>
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
        </style>
        <script>
            function back()
            {
                window.location.href="class_teacher_function.php";
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
            if(isset($_SESSION['teacher_id'])){
                
                 
                 $tid=$_SESSION['teacher_id'];

                 $sql="SELECT class_id from staff_type WHERE teacher_id='$tid';";
                 $result=mysqli_query($conn,$sql);
          
            ?>

                 <div id="adding_form">
                 <form  method="post" id="addform" >

               <p> <h2> <center>Enter Student Attendance</center></h2></p>
                   
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

                echo '<script type="text/JavaScript">';
                echo 'alert("please login to continue");';
                echo 'window.location.href="teacher_login.html";';
                echo '</script>' ;
            }


          
          if(isset($_POST['std']))
            {

            $std=$_POST['std'];

    
            $sql = "SELECT reg_num,name FROM `student` WHERE std='$std';";
            
            $result = mysqli_query($conn, $sql);  
            
            $count = mysqli_num_rows($result);  
            if($count>=1)
            {  
                ?>
            <div id="adding_form">
            <form action="update_attendance.php" method="post" id="addform" >

            <p>
           <label>CLASS</label>
        <input type="text" name="class"  id="reg"  readonly value="<?php echo $std; ?>"></input>
        </p>

        <p>
           <label>NAME:</label>
           <select name="reg"   id="std">
           <option value="">Select option</option>
           <?php
           while($row=mysqli_fetch_array($result))
           {
            ?>
              <option value="<?php echo $row['reg_num']; ?>"><?php echo $row['reg_num']."->".$row['name']; ?></option> 

              <?php
           }
        
       ?>
       </select>
        </p>

        <p>
           <label>Academic Year</label>
        <input type="text" name="year"  id="reg" ></input>
        </p>
        
        <p>
           <label>TOTEL CLASS :</label>
        <input type="text" name="totel"  id="reg" ></input>
        </p>
        <p>
           <label>PRESENTED:</label>
        <input type="text" name="pres"  id="reg" ></input>
        </p>
        

        <p>
              <input type="submit" value="ADD" name="GET DATA" class="btn"/>
            </p>
<?php

           }

           
           else{

            echo '<script type="text/JavaScript">';
            echo 'alert("NO STUDENT in THIS Class EXIST");';
            echo 'window.location.href="attendence.php";';
            echo '</script>' ;

        }
    }

    

           
            ?>
       
           

            



            

            
           
        </body>
        
    </head>
    
</html>