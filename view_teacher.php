<!DOCTYPE html>
<html>
    <head>
        <link href="header.css" rel="stylesheet" type="text/css">
        <link href="body.css" rel="stylesheet" type="text/css">
        <link href="sidebar.css" rel="stylesheet" type="text/css">
        <link href="view_prof.css" rel="stylesheet" type="text/css">
        <title>Admin Page</title>
        <style>
            #disp1{
                padding: 30px;
   margin-top: 2cm;
   margin-right: 1cm;
   margin-left: 7cm;
   border-radius: 20px;
   border: 3px solid black;
   background-color: rgba(184, 235, 224, 0.507);
            }
             
        </style>
         <script>
            function back()
            {
                window.location.href="view_teacher.php";
            }
            </script>
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
            <input type="radio" name="sel" value="tid" id="gender" required>TEACHER ID</input>
            <input type="radio" name="sel" value="all"  id="gender" required> ALL </input>
            
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

               if($sel=="tid")
               { ?>
                <div id="adding_form">
                <form  method="post" action="view_by_tid.php" id="addform">
                <p>
                <label> Enter TEACHER ID:</label>
             <input type="text" name="tid"  id="reg" ></input>
             </p>
             
             <p>
              <input type="submit" value="GET_DETAIL" name="GET DATA" class="btn"/>
            </p>

            <?php 
             }
            

            if($sel=="all")
            {
            ?>
             <div id="disp1">
            <h2><center>TEACHER LIST </center></h2>
        
            <table border="1px solid black">
        <tr id="header">  
          <th> NAME</th>
          <th>TID</th>
          <th>SUBJECT</th>
          <th>PHONE</th>
          <th>DOB</th>
          <th>EMAIL</th>
          <th>GENDER</th>
          <th>SALERY</th>
          <th>ADDRESS</th>
              </tr>
        <?php
           $sql = "SELECT * from teacher,subject WHERE teacher.sub=subject.sub_id;";
         $result = mysqli_query($conn, $sql);  
       $count = mysqli_num_rows($result);
        if( $count>=1)
            {
               
              
                while($row=mysqli_fetch_array($result))
                 {
            ?>
                      
                      <tr>

                      <td><?php echo $row['teacher_name']; ?></td>
                      <td><?php echo $row['tid']; ?></td>
                      <td><?php echo $row['sub_name']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                      <td><?php echo $row['bdate']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['gender']; ?></td>
                      <td><?php echo $row['salary']; ?></td>
                      <td><?php echo $row['address']; ?></td>
              </tr>
          
              <?php
                 }
                 ?>
                 </table>

                 <?php
            }
            ?>

            <p>
      <input type="button" value="BACK" name="UPDATE" onclick="back()" class="btn1"/>
      </p>
  
  </div>
  
  <?php

        }
    }
    ?>
    </body>
    </html>
      
      


                




     

                
           

           