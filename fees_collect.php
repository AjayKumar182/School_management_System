<!DOCTYPE html>
<html>
    <head>
        <link href="header.css" rel="stylesheet" type="text/css">
        <link href="body.css" rel="stylesheet" type="text/css">
        <link href="sidebar.css" rel="stylesheet" type="text/css">
        <link href="add.css" rel="stylesheet" type="text/css">
        <title>Admin Page</title>
        <style>
             
        </style>
        <header>
            <nav>
                <a id="home" href="#" >Home</a>
                
                <a id="logout" href="admin_logout.php">Logout</a>
                
                
            </nav>
        </header>
        <body>
            <div class="sidebar">
               
                     <li>
                   <ul> <a id="sidemenu" href="add_student.html">ADD STUDENT</a></ul>
                   
                   <ul> <a id="sidemenu" href="update_student.php">UPDATE STUDENT</a></ul>
                   <ul> <a id="sidemenu" href="add_teacher.html">ADD TEACHER</a></ul>
                   <ul> <a id="sidemenu" href="update_teacher.php">UPDATE TEACHER</a></ul>

                   
              <ul> <a id="sidemenu"href="admin_view.php">VIEW</a></ul>

                   </li>
                
    

            </div>
            <div id="adding_form">
                <form method="post" id="addform">

               <p> <h2> <center> FEE COLLECT </center></h2></p>
                    <p>
                <label>RegisterNumber:</label>
             <input type="text" name="reg"  id="reg" required></input>
             </p>

              <p>
              <input type="submit" value="GET DATA" name="GET DATA" class="btn"/>
            </p>
       
       </form>
          </div>
          <?php

            include('connection.php');
            if(isset($_POST['reg']))
            {

            $reg=$_POST['reg'];

    
            $sql = "SELECT reg_num,name FROM `student` WHERE reg_num='$reg';";

            $result = mysqli_query($conn, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
        

           
            if( $count>=1)
            {
                $sql1="SELECT class,totel,paid,balance from fees where reg_num='$reg';";

                $res=mysqli_query($conn,$sql1);
        
            $row1=mysqli_fetch_array($res);
          
            ?>

                 <div id="adding_form">
                 <form action="fees_update.php" method="post" id="addform" >

               <p> <h2> <center> FEES RECIEPT </center></h2></p>
                   
             <p>
                <label>RegisterNumber:</label>
             <input type="text" name="reg"  id="reg" readonly value="<?php echo $row['reg_num']; ?>"></input>
             </p>

             <p>
                <label>NAME:</label>
             <input type="text" name="name"  id="reg" readonly value="<?php echo $row['name']; ?>"></input>
             </p>

             <p>
                <label>CLASS:</label>
             <input type="text" name="std"  id="reg" readonly value="<?php echo $row1['class']; ?>"></input>
             </p>
             
             <p>
                <label>TOTEL:</label>
             <input type="text" name="totel"  id="reg" readonly value="<?php echo $row1['totel']; ?>"></input>
             </p>

            <p>
                <label>PAID:</label>
             <input type="text" name="paid"  id="reg" readonly value="<?php echo $row1['paid']; ?>"></input>
             </p>

             <p>
                <label>BALENCE:</label>
             <input type="text" name="balence"  id="reg" readonly value="<?php echo $row1['balance']; ?>"></input>
             </p>
                  
             <?php
                if($row1['balance'])
                {
                      
              ?>
               
               <p>
                <label>PAY BALENCE:</label>
             <input type="text" name="pay_bal"  id="reg" ></input>
             </p>

              <p>
              <input type="submit" value="UPDATE" name="GET DATA" class="btn"/>
            </p>
            <?php

                }
                ?>

       </form>
          </div>

          <?php 
           }


            else{

                echo '<script type="text/JavaScript">';
                echo 'alert("NO STUDENT WITH THIS REG EXIST");';
                echo 'window.location.href="fees_collect.php";';
                echo '</script>' ;
            }
       
           

            }



            
            ?>
            
           
        </body>
        
    </head>
    
</html>