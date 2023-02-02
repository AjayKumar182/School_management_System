
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

               <p> <h2> <center>Add Student Marks</center></h2></p>
                   
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
             $sql1= "SELECT sub_name,sub_id from subject,teacher WHERE subject.sub_id=teacher.sub and tid='$tid';";
            $result = mysqli_query($conn, $sql);  
            $result2 = mysqli_query($conn, $sql1);  
            $count = mysqli_num_rows($result);  
            if($count>=1)
            {  
                ?>
            <div id="adding_form">
            <form action="update_marks2.php" method="post" id="addform" >
        <p>
           <label>NAME:</label>
           <select name="name"   id="std">
           <option value="">Select option</option>
           <?php
           while($row=mysqli_fetch_array($result))
           {
            ?>
              <option value="<?php echo $row['reg_num']; ?>"><?php echo $row['reg_num']."->".$row['name']; ?></option> 

              <?php
           }
           $row2=mysqli_fetch_array($result2);
       ?>
       </select>
        </p>

        <p>
           <label>Subject Name:</label>
        <input type="text" name="sub"  id="reg"  value="<?php echo $row2['sub_name']; ?>" readonly ></input>
        </p>

        <p>
           <label>Subject ID:</label>
        <input type="text" name="sub_id"  id="reg"  value="<?php echo $row2['sub_id'];  ?>" readonly></input>
        </p>

        <p>
           <label>class:</label>
        <input type="text" name="std"  id="reg"  value="<?php echo $std  ?>" readonly></input>
        </p>
        
        <p>
           <label>TOTEL Marks:</label>
        <input type="text" name="totel"  id="reg" ></input>
        </p>
        <p>
           <label>Obtained Marks:</label>
        <input type="text" name="obt"  id="reg" ></input>
        </p>

        <p>
              <input type="submit" value="ADD" name="GET DATA" class="btn"/>
            </p>
<?php

           }

           
           else{

            echo '<script type="text/JavaScript">';
            echo 'alert("NO STUDENT in THIS Class EXIST");';
            echo 'window.location.href="add_marks2.php";';
            echo '</script>' ;

        }
    }

    

           
            ?>
       
           

            



            

            
           
        </body>
        
    </head>
    
</html>