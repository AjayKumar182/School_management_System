
<?php
session_start();
include('connection.php');

$sql = "SELECT count(*) as totel_student FROM student;";

$sql1="SELECT count(*) as totel_teacher FROM teacher;";

$sql2="SELECT sum(paid) as totel FROM fees;";

$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$result1 = mysqli_query($conn, $sql1);  
$row1= mysqli_fetch_array($result1, MYSQLI_ASSOC);

$result2 = mysqli_query($conn, $sql2);  
$row2= mysqli_fetch_array($result2, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="header.css" rel="stylesheet" type="text/css">
        <link href="body.css" rel="stylesheet" type="text/css">
        <link href="sidebar.css" rel="stylesheet" type="text/css">
        <link href="box_view.css" rel="stylesheet" type="text/css">
        <title>Admin Page</title>
                <script>

          function change_student(){

            window.location.href="view_student.php";
          }

          function change_teach(){

window.location.href="view_teacher.php";
}
   function change_fee(){

         window.location.href="view_fees.php";
        }

        </script>
         </head>
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
                   <ul> <a id="sidemenu"href="fees_collect.php">FEE COLLECTION</a></ul>
                  

                   </li>
                
    

            </div>
            
             <?php
             if(isset($_SESSION['admin'])){
               echo  "<center><h1>welcome ".$_SESSION['admin']."</center></h1>";
             }
             else{
              echo '<script> type="text/JavaScript">';
              echo 'alert("Please login to continue");';
              echo 'window.location.href="admin_login.html";';
              echo '</script>' ;
             }
               ?>

            <div id="view">
                <div id="student" onclick="change_student()">
                  <p><img src="image\student.jpg"  width="50"></img></p>
                  <label style="font-family: Georgia, serif; ">STUDENT :  <?php echo $row['totel_student']; ?> </label>
                  
                   
                </div>

                <div id="teach" onclick="change_teach()">
                  <p><img src="image\teacher.png"  width="50"></img></p>

                  <label style="font-family: Georgia, serif; ">TEACHER : <?php echo $row1['totel_teacher']; ?> </label>
                   
                </div>

                <div id="fee" onclick="change_fee()">
                  <p><img src="image\fees.png"  width="50"></img></p>
                  <label style="font-family: Georgia, serif; ">TOTEL_FEE: Rs <?php echo $row2['totel']; ?> </label>
                 
                   
                </div>
            </div>

            
            
           
        </body>
        
   
    
</html> 