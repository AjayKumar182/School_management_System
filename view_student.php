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

               <p> <h2> <center> VIEW BY </center></h2></p>

               
               <p>
             <label>SELECT:</label>
            <input type="radio" name="sel" value="reg" id="gender" required> REG_NUM</input>
            <input type="radio" name="sel" value="cls"  id="gender" required> CLASS </input>
            
            </p>

              <p>
              <input type="submit" value="SUBMIT" name="GET DATA" class="btn"/>
            </p>
       
       </form>
          </div>
          <?php

            include('connection.php');
            if(isset($_POST['sel']))
            {     

            $sel=$_POST['sel'];

               if($sel=="reg")
               { ?>
                <div id="adding_form">
                <form  method="post" action="view_by_reg.php" id="addform">
                <p>
                <label> Enter RegisterNumber:</label>
             <input type="text" name="reg"  id="reg" ></input>
             </p>
             
             <p>
              <input type="submit" value="GET_DETAIL" name="GET DATA" class="btn"/>
            </p>

            <?php  }
            

            if($sel=="cls")
            {
                ?>

                <div id="adding_form">
                <form  method="post" action="view_by_class.php" id="addform">
                <p>
                <label> Enter CLASS:</label>
                <select name="std"   id="std" >
                <option value="">Select option</option>
                <option value="1">1st</option>
                <option value="2">2nd</option>
                <option value="3">3rd</option>
                <option value="4">4th</option>
                <option value="5">5th</option>
                <option value="6">6th</option>
                <option value="7">7th</option>
                <option value="8">8th</option>
                <option value="9">9th</option>
                <option value="10">10th</option>
            </select>
             </p>
             
             <p>
              <input type="submit" value="GET_DETAIL" name="GET DATA" class="btn"/>
            </p>

<?php

            }


               }

    
            ?>

